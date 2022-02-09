<?php
namespace app\routes;

class Routes
{
    public static function get()
    {
        return [
            'get' => [
              '/' => 'HomeController@index',
              '/register' => 'RegisterController@store'
            ],
            'post' => []
        ];
    }
}
