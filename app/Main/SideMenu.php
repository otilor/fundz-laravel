<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array[]
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'route_name' => 'dashboard-overview-1',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Home'
            ],
            'savings' => [
                'icon' => 'lock',
                'route_name' => 'savings',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Savings'
            ],
            'withdraw' => [
                'icon' => 'dollar-sign',
                'route_name' => 'withdraw',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Withdraw'
            ],
            'safelock' => [
                'icon' => 'lock',
                'route_name' => 'safelock',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Safelock'
            ],
        ];
    }
}
