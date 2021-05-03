<?php


namespace App\Services;


use App\Models\User;
use App\Repositories\UserRepository;
use Bavix\Wallet\Models\Wallet;

class UserService implements UserRepository
{
    public function getWalletBalance($userId)
    {
        $user = User::find($userId);

        return ['user' => $user, 'balance' => $user->balance];
    }

    public function topupWallet($amount, $userId)
    {
        $user = User::find($userId);
        $user->deposit((int) $amount);

        return ['message' => 'Successfully topped up wallet', 'status' => true];
    }
}
