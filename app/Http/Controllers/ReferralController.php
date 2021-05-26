<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class ReferralController extends Controller
{
    public function index()
    {
        $referrals = User::select('name','email','created_at')->where('referred_by',auth()->user()->affiliate_id)->get();
        return view('pages.Referral.index', compact('referrals'));
    }
}
