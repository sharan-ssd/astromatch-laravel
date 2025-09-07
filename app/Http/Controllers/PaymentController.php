<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

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
}
