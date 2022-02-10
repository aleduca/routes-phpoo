<?php
namespace app\controllers;

use app\controllers\Controller;
use League\Plates\Engine;

class UserController extends Controller
{
    public function edit($params)
    {
        $this->view(
            'user',
            [
                'name' => 'Alexandre',
                'title' => 'Página do user'
            ]
        );
    }
}
