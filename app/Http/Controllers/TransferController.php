<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferRequest;
use App\Repositories\UserRepository;
use App\Models\User;

class TransferController extends Controller
{
    public function __construct(public UserRepository $user)
    {
    }
    public function index()
    {
        return view('pages.transfer.index');
    }

    public function transfer(TransferRequest $request)
    {
        if(auth()->user()->balance < $request->amount)
        {
            session()->flash('error', 'Fundz you no get! 😕');
            return back();
        }


        $RecieverId = User::where('email', $request->email)->pluck('id')->first();
        $transferFundz = $this->user->topupWallet(amount: $request->amount, userId: $RecieverId);

        if($transferFundz){
            $deductFundz = User::find(auth()->id())->withdraw($request->amount);
            session()->flash('success','Transfer of '. $request->amount . ' 🤑 to ' . $request->email. ' was successful🙌🏻. ');
            return redirect('/');
        }
        else{
            session()->flash('error','Transfer of '. $request->amount . '🤑 to' . $request->email. 'Failed.😞');
            return back();
        }
    }
}
