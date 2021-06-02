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

    public function getUserReferrals($affiliate_id){
        $referrals = User::select('name','email','affiliate_id','created_at','paid')->whereReferred_by($affiliate_id)->orderBy('created_at','desc')->get();
        return ['referrals' => $referrals,'status' => true];
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

        User::find($userId)->withdraw($amount);
        return true;
    }

    public function payReferrar($ReferredUserDetails,$affiliateId)
    {
        $payReferrar = User::where('affiliate_id',$ReferredUserDetails->referred_by)->update([
            'referral_earning' => auth()->user()->referral_earning + 1000,
        ]);
        if($payReferrar){
            User::where('affiliate_id',$affiliateId)->update([
                'paid' => true,
            ]);
            return ['message' => 'You have be credited 1000 🤩 🥳 🥳', 'status' => true];
        }
        else{
            return ['message' => 'There was an issue while processiing your payment. Try again in 5 minutes', 'status' => false];

        }
    }

    public function getReferredUserDetails($affiliateId)
    {
        $ReferredUserDetails = User::whereAffiliate_id($affiliateId)->first();
        return ['details' => $ReferredUserDetails];
    }
}
