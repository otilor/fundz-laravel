<?php


namespace App\Classes;


class UpdatedRave extends \KingFlamez\Rave\Rave
{
    public function getTransactionIDFromCallback()
    {
        $transactionID = request()->transaction_id;

        if (!$transactionID) {
            return;
        }

        return $transactionID;
    }
}
