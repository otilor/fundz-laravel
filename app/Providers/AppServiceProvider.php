<?php

namespace App\Providers;

use App\Classes\UpdatedRave;
use App\Repositories\GroupRepository;
use App\Repositories\UserRepository;
use App\Services\GroupService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, UserService::class);
        $this->app->bind(GroupRepository::class, GroupService::class);
        $this->app->bind('new-laravel-rave', UpdatedRave::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
