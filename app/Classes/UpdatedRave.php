<?php


namespace App\Classes;


class UpdatedRave extends \KingFlamez\Rave\Rave
{
    public function getTransactionIDFromCallback()
    {
        $transactionID = request()->transaction_id;

        if (!$transactionID) {
            $transactionID = json_decode(request()->resp)->data->id;
        }

        return $transactionID;
    }
}
