<?php


namespace App\Http\Controllers;


use App\Http\Request\SaveMoneyRequest;
use App\Repositories\UserRepository;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class SavingsController extends Controller
{
    public function __construct(public UserRepository $user)
    {
    }

    public function index()
    {
        return view('pages/savings');
    }

    public function save(SaveMoneyRequest $request)
    {
        $this->user->topupWallet(userId: auth()->id(), amount: $request->amount);
        return redirect(route('dashboard-overview-1'));
    }

    public function callback()
    {
        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);

        dd($data);
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the $data['data']['status'] is 'successful'
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}
