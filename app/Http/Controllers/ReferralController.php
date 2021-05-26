<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class ReferralController extends Controller
{
    public function referral_link()
    {
        return auth()->user()->getReferralLink();
    }
}
