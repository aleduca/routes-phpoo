<?php
namespace app\controllers;

use app\database\Filters;
use app\database\models\User;
use app\database\Pagination;

class HomeController extends Controller
{
    public function index()
    {
        $filters = new Filters;
        $filters->where('users.id', '>', 190);
        // $filters->join('posts', 'users.id', '=', 'posts.userId', 'left join');

        $pagination = new Pagination;
        $pagination->setItemsPerPage(20);

        $user = new User;
        $user->setFields('users.id,firstName,lastName');
        $user->setFilters($filters);
        $user->setPagination($pagination);
        $usersFound = $user->fetchAll();

        $this->view('home', ['title' => 'Home','users' => $usersFound,'pagination' => $pagination]);
    }
}
