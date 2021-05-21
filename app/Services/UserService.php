<?php


namespace App\Services;


use App\Models\User;
use App\Repositories\UserRepository;
use App\Facades\UpdatedRave as Flutterwave;
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

    public function withdraw($amount, $userId)
    {
        $balance = $this->getWalletBalance($userId)['balance'];
        if ((int)$amount > (int)$balance) {
            return false;
        }

        $reference = Flutterwave::generateReference();

        $data = [
            "account_bank"=>"044",
            "account_number"=>"0690000040",
            "amount"=>$amount,
            "narration"=>"Transfer from Fundz",
            "currency"=>"NGN",
            "debit_currency"=>"NGN",
            'reference' => $reference
];

        $transfer = Flutterwave::transfers()->initiate($data);

        dd($transfer);
        User::find($userId)->withdraw($amount);
        return true;
    }
}
