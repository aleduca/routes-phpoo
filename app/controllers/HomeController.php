<?php
namespace app\controllers;

use app\database\Filters;
use app\database\models\User;

class HomeController extends Controller
{
    public function index()
    {
        $filters = new Filters;
        $filters->where('id', '>', 0);

        $user = new User;
        $user->setFilters($filters);
        $userFound = $user->findBy();


        dd($userFound);

        // $filters->dump();


        $this->view('home', ['title' => 'Home' ]);
    }
}
