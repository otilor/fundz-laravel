<?php


namespace App\Repositories;


interface UserRepository
{
    public function getWalletBalance($userId);

    public function topupWallet($amount, $userId);
}
