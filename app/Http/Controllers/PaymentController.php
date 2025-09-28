<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function createOrder(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $amount = $request->amount * 100;

        $order = $api->order->create([
            'receipt'         => 'rcptid_' . time(),
            'amount'          => $amount, // in paise
            'currency'        => 'INR',
            'payment_capture' => 0 
        ]);

        return response()->json([
            'orderId'   => $order['id'],
            'amount'    => $amount,
            'currency'  => 'INR',
            'key'       => env('RAZORPAY_KEY')
        ]);
    }

    public function capturePayment(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $paymentId = $request->input('razorpay_payment_id') ?? 'free_payment';
        $orderId = $request->input('razorpay_order_id');
        $signature = $request->input('razorpay_signature');

        $XavierReport = \App\Models\XavierReport::find($request->input('xavier_report_id'));

        if (!$XavierReport) {
            return response()->json(['status' => 'error', 'message' => 'Xavier Report not found'], 404);
        }

        $XavierReport->payment_status = 'paid';
        $XavierReport->payment_id = $paymentId;
        
        $astro_match = DB::select('SELECT * FROM ab_savedMatch_table WHERE sno = ?', [$XavierReport->match_id]);
        if (!$astro_match) {
            return response()->json(['status' => 'error', 'message' => 'Astro Match not found'], 204);
        }

        DB::table('ab_savedMatch_table')->where('sno', $XavierReport->match_id)->update(['isPaymentDone' => 'Y']);
        $XavierReport->save();

        if ($request->input('amount') < 2 ) {
            return response()->json(['status' => 'success', 'data' => array(), 'astro_match' => $astro_match]);
        }
        
        if (!$this->verifyPaymentSignature($paymentId, $orderId, $signature)) {
            return response()->json(['status' => 'error', 'message' => 'Invalid payment signature'], 400);
        } 
        
        try {
            $response = $api->payment->fetch($paymentId)->capture(['amount' => $request->input('amount') * 100]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage(), 'astro_match' => $astro_match]);
        }
        

        return response()->json(['status' => 'success', 'data' => $response, 'astro_match' => $astro_match]);

    }

    private function verifyPaymentSignature($paymentId, $orderId, $signature)
    {
        $generatedSignature = hash_hmac('sha256', $orderId . '|' . $paymentId, env('RAZORPAY_SECRET'));
        return $generatedSignature === $signature;
    }


    public function validateCoupon(Request $request)
    {
        $couponCode = strtoupper($request->input('coupon_code'));
        $price = $request->input('price');

        $coupon = DB::table('ivr0_coupons_table')
            ->where('couponCode', $couponCode)
            ->where('isActive', 'Y')
            ->first();

        if (!$coupon) {
            return response()->json(['status' => 'error', 'message' => 'Invalid coupon code'], 400);
        }

        // if (strtotime($coupon->valid_until) < time()) {
        //     return response()->json(['status' => 'error', 'message' => 'Coupon has expired'], 400);
        // }

        // if($coupon->usage_limit <= $coupon->times_used) {
        //     return response()->json(['status' => 'error', 'message' => 'Coupon usage limit reached'], 400);
        // }
        
        if($coupon->discountType == 'NetValue'){
            return response()->json(['status' => 'success',  'final_amount' => $coupon->discountValue, 'discount_amount' => $price - $coupon->discountValue]);
        }

        if($coupon->discountType == 'Value'){
            return response()->json(['status' => 'success',  'final_amount' => $price - $coupon->discountValue, 'discount_amount' => $coupon->discountValue]);
        }

        if ($coupon->discountType !== 'Percentage') {
            return response()->json(['status' => 'error', 'message' => 'Invalid coupon type']);
        }
        
        return response()->json([
            'status' => 'success',
            'discount_type' => 'Percentage',
            'discount_amount' => ($price * $coupon->discountValue / 100),
            'final_amount' => max(0, $price - ($price * $coupon->discountValue / 100))
        ]);
    }
}