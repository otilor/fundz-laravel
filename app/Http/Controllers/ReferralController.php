<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\User;
use App\Repositories\UserRepository;

class ReferralController extends Controller
{
    public function __construct(public UserRepository $user)
    {
    }
    public function index()
    {
        $referrals = $this->user->getUserReferrals(auth()->user()->affiliate_id)['referrals'];
        return view('pages.Referral.index', compact('referrals'));
    }

    public function RequestPayment($affiliateId)
    {
        $ReferredUserDetails = $this->user->getReferredUserDetails($affiliateId)['details'];
        if($ReferredUserDetails->email_verified_at == null)
        {
            return redirect()->back()->with('error', 'The User you referred has not been verified.');
        }
        else
        {
            $this->user->topupWallet(amount: 1000, userId: auth()->id());
            $payUser = $this->user->payReferrar($ReferredUserDetails, $affiliateId);
            if($payUser['status'] == true)
            {
                return redirect()->back()->with('error', 'You have be credited 1000 🤩 🥳 🥳');
            }
            else {
                return redirect()->back()->with('error', 'There was an issue while processiing your payment. Try again in 5 minutes');
            }
        }
    }
}
