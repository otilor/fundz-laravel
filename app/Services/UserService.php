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
}
