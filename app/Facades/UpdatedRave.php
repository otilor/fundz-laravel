<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class UpdatedRave extends \KingFlamez\Rave\Facades\Rave
{
    protected static function getFacadeAccessor()
    {
        return 'new-laravel-rave';
    }
}
