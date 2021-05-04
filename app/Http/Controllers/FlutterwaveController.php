<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class FlutterwaveController extends Controller
{
    public function webhook(Request $request)
    {
        //This verifies the webhook is sent from Flutterwave
        $verified = Flutterwave::verifyWebhook();

        // if it is a charge event, verify and confirm it is a successful transaction
        if ($verified && $request->event == 'charge.completed' && $request->data->status == 'successful') {
            $verificationData = Flutterwave::verifyPayment($request->data['id']);
            if ($verificationData['status'] === 'success') {
                // process for successful charge

            }

        }

        // if it is a transfer event, verify and confirm it is a successful transfer
        if ($verified && $request->event == 'transfer.completed') {

            $transfer = Flutterwave::transfers()->fetch($request->data['id']);

            if ($transfer['data']['status'] === 'SUCCESSFUL') {
                auth()->user()->deposit($transfer['data']['amount']);
            } else if ($transfer['data']['status'] === 'FAILED') {
                // update transfer status to failed in your db
                // revert customer balance back
            } else if ($transfer['data']['status'] === 'PENDING') {
                // update transfer status to pending in your db
            }

        }

    }
}
