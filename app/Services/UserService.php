<?php


namespace App\Services;


use App\Repositories\UserRepository;
use Bavix\Wallet\Models\Wallet;

class UserService implements UserRepository
{

    public function getWalletBalance($userId)
    {
        $user = User::find($userId);
        return $user->balance;
    }
}
