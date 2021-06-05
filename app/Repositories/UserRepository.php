<?php


namespace App\Repositories;


interface UserRepository
{
    public function getUser($id);

    public function getWalletBalance($userId);

    public function topupWallet($amount, $userId);

    public function withdraw($amount, $userId);

    public function payReferrar($ReferredUserDetails, $affiliateId);

    public function getReferredUserDetails($affiliateId);

    public function getUserReferrals($affiliateId);

    public function getUserWithPaymentHash($paymentHash);
}
