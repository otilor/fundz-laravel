<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class ReferralController extends Controller
{
    public function index()
    {
        $referrals = User::select('name','email','affiliate_id','created_at','paid')->where('referred_by',auth()->user()->affiliate_id)->orderBy('created_at','desc')->get();
        return view('pages.Referral.index', compact('referrals'));
    }

    public function RequestPayment(Request $request)
    {
        $referred_by = User::select('referral_earning')->where('referred_by', auth()->user()->affiliate_id)->first();
        $referred_by = $referred_by->referral_earning + 1000;

        $ReferredUserDetails = User::where('affiliate_id',$request->affiliate_id)->first();
        if($ReferredUserDetails->email_verified_at == null)
        {
            return redirect()->back()->with('error', 'The User you referred has not been verified.');
        }
        else
        {
            $payUser = User::where('affiliate_id',$ReferredUserDetails->referred_by)->update([
                'referral_earning' => auth()->user()->referral_earning + 1000,
                ]);
            User::where('affiliate_id',$request->affiliate_id)->update([
                'paid' => true,
            ]);
            if($payUser){
                return redirect()->back()->with('success','You have be credited 1000 🤩 🥳 🥳');
            }
            else{
                return redirect()->back()->with('error','There was an issue while processiing your payment. Try again in 5 minutes');
            }
        }
    }
}
