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
                'icon' => 'inbox',
                'route_name' => 'dashboard-overview-1',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Home'
            ],
            'savings' => [
                'icon' => 'lock',
                'route_name' => 'inbox',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Savings'
            ],
            'devider',
            'crud' => [
                'icon' => 'dollar-sign',
                'title' => 'Topup',
                'sub_menu' => [
                    'crud-data-list' => [
                        'icon' => '',
                        'route_name' => 'crud-data-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Fundz wallet'
                    ],
                    'crud-form' => [
                        'icon' => '',
                        'route_name' => 'crud-form',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Safe lock'
                    ]
                ]
            ],
        ];
    }
}
