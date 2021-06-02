<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class ReferralController extends Controller
{
    public function __construct(public UserRepository $user)
    {
    }
    public function index()
    {
        $referrals = User::select('name','email','affiliate_id','created_at','paid')->whereReferred_by(auth()->user()->affiliate_id)->orderBy('created_at','desc')->get();
        return view('pages.Referral.index', compact('referrals'));
    }

    public function RequestPayment($affiliate_id)
    {
        $ReferredUserDetails = User::whereAffiliate_id($affiliate_id)->first();
        if($ReferredUserDetails->email_verified_at == null)
        {
            return redirect()->back()->with('error', 'The User you referred has not been verified.');
        }
        else
        {
            $this->user->topupWallet(amount: 1000, userId: auth()->id());
            $payReferrar = User::where('affiliate_id',$ReferredUserDetails->referred_by)->update([
                'referral_earning' => auth()->user()->referral_earning + 1000,
            ]);
            if($payReferrar){
                User::where('affiliate_id',$affiliate_id)->update([
                    'paid' => true,
                ]);
                return redirect()->back()->with('success','You have be credited 1000 🤩 🥳 🥳');
            }
            else{
                return redirect()->back()->with('error','There was an issue while processiing your payment. Try again in 5 minutes');
            }
        }
    }
}
