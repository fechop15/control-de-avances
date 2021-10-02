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
            'Principal' => [
                'icon' => 'inbox',
                'route_name' => 'inicio',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Inicio'
            ],
            'Proyectos' => [
                'icon' => 'inbox',
                'route_name' => 'proyectos',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Proyectos'
            ],
            'salir' => [
                'icon' => 'toggle-right',
                'route_name' => 'logout',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Salir'
            ],
            'devider',
        ];
    }
}
