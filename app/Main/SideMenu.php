<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
        ];
    }
}
