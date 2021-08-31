<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferRequest;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Facades\CauserResolver;

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
            CauserResolver::setCauser(User::find(auth()->id()));
            activity()
                ->withProperty('created_at', now())
                ->log("Transfered ₦{$request->amount} to {$request->email}");

            session()->flash('success','Transfer of '. $request->amount . ' 🤑 to ' . $request->email. ' was successful🙌🏻. ');
            return redirect()->route('dashboard');
        }
        else{
            session()->flash('error','Transfer of '. $request->amount . '🤑 to' . $request->email. 'Failed.😞');
            return back();
        }
    }
}
