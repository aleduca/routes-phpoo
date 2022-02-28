<?php
namespace app\support;

use app\core\Request;
use Exception;

class Csrf
{
    public static function getToken()
    {
        if (isset($_SESSION['token'])) {
            unset($_SESSION['token']);
        }

        $_SESSION['token'] = md5(uniqid());

        return "<input type='hidden' name='token' value='{$_SESSION['token']}'>";
    }


    public static function validateToken()
    {
        if (!isset($_SESSION['token'])) {
            throw new Exception("Token inválido");
        }

        $token = Request::only('token');

        // dd($token['token'], $_SESSION['token']);

        if (empty($token) || $_SESSION['token'] !== $token['token']) {
            throw new Exception("Token inválido");
        }

        unset($_SESSION['token']);

        return true;
    }
}
