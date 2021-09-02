<?php

namespace App\Repositories;

interface SafelockRepository
{
    public function createSafelock($data);

    public function getInterestRate($data); // $data is duration
}