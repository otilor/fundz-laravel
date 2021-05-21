<?php


namespace App\Classes;


class RetrieveSafeLocks
{
    public function __invoke()
    {
        return [
            'name' => 'Tolani\'s safelock',
            'balance' => 13000,
            'description' => 'Christmas fundz'
        ];
    }
}
