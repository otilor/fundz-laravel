<?php


namespace App\Traits;


trait UserReferral
{
    use \Questocat\Referral\Traits\UserReferral;

    public function getReferralLink() : string
    {
        return url('/register').'/?ref='.$this->affiliate_id;
    }
}
