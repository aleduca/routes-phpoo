<?php
namespace app\controllers;

use app\controllers\Controller;
use app\core\Request;
use app\database\models\User;
use app\support\Csrf;
use app\support\Validate;

class UserController extends Controller
{
    public function edit($params)
    {
        $this->view(
            'user',
            [
                'title' => 'Editar user'
            ]
        );
    }

    public function update($params)
    {
        // dd($params);
        $validate = new Validate;
        $validated = $validate->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'email|required|unique:'.User::class,
            'password' => 'maxLen:5|required',
        ]);

        if (!$validated) {
            return redirect('/user/12');
        }

        dd($validated);
    }
}
