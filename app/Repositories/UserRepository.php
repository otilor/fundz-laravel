<?php


namespace App\Repositories;


interface UserRepository
{
    public function getWalletBalance($userId);
}
