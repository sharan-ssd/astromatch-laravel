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
            'payment_capture' => 1 
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
        $paymentId = $request->input('razorpay_payment_id');
        $orderId = $request->input('razorpay_order_id');
        $signature = $request->input('razorpay_signature');

        $isValid = $this->verifyPaymentSignature($paymentId, $orderId, $signature);
        if (!$isValid) {
            return response()->json(['status' => 'error', 'message' => 'Invalid payment signature'], 400);
        }

        $XavierReport = \App\Models\XavierReport::find($request->input('xavier_report_id'));

        if (!$XavierReport) {
            return response()->json(['status' => 'error', 'message' => 'Xavier Report not found'], 404);
        }

        $XavierReport->update(['payment_status' => 'paid']);
        $XavierReport->update(['payment_id' => $paymentId]);

        $astro_match = DB::select('SELECT * FROM ab_savedMatch_table WHERE sno = ?', [$XavierReport->match_id]);

        try {
            $response = $api->payment->fetch($paymentId)->capture(['amount' => $request->input('amount') * 100]);
            return response()->json(['status' => 'success', 'data' => $response, 'astro_match' => $astro_match]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    private function verifyPaymentSignature($paymentId, $orderId, $signature)
    {
        $generatedSignature = hash_hmac('sha256', $orderId . '|' . $paymentId, env('RAZORPAY_SECRET'));
        return $generatedSignature === $signature;
    }
}