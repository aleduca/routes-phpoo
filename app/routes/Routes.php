<?php
namespace app\routes;

class Routes
{
    public static function get()
    {
        return [
            'get' => [
              '/' => 'HomeController@index',
              '/user/[0-9]+' => 'UserController@edit',
              '/product/[a-z]+/category/[a-z]+' => 'ProductController@show',
              '/register' => 'RegisterController@store',
              '/contact' => 'ContactController@index'
            ],
            'post' => [
                '/user/update' => 'UserController@update',
                '/contact' => 'ContactController@store'
            ]
        ];
    }
}
