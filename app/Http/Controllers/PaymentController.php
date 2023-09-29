<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function bayar()
    {
        return view('siswa.bayar');
    }
    public function index()
    {
        return view('midtrans');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $amount = 12300;

        $payment = Payment::create([
            'id_user' => 1,
            'amount' => $amount
        ]);

        $order_id = 34+ $payment->id;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $amount,
            ),
            'customer_details' => array(
                'email' => 'budi.pra@example.com',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $payment_user = Payment::find($payment->id);
        $payment_user->update([
            'snapToken' => $snapToken
        ]);

        return view('siswa.bayar',compact('snapToken'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    public function notification(){
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        $payment = Payment::find($order_id - 34);

        if ($transaction == 'capture') {
            if ($type == 'credit_card'){
                if($fraud == 'accept'){
                    // TODO set payment status in merchant's database to 'Success'
                    $payment->update([
                        'status_payment' => 2,
                        'status' => 2
                    ]);
                    echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
                }else{
                    $payment->update([
                        'status_payment' => -1,
                        'status' => -1
                    ]);
                }
            }
        }
        else if ($transaction == 'settlement'){
            // TODO set payment status in merchant's database to 'Settlement'
            $payment->update([
                'status_payment' => 2,
                'status' => 2
            ]);
            echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
        }
        else if($transaction == 'pending'){
            $payment->update([
                'status_payment' => 1,
                'status' => 1
            ]);
            echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        }
        else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            $payment->update([
                'status_payment' => -1,
                'status' => -1
            ]);
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        }
        else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $payment->update([
                'status_payment' => -2,
                'status' => -1
            ]);
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
        }
        else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            $payment->update([
                'status_payment' => -3,
                'status' => -1
            ]);
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
