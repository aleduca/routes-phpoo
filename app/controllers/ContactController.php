<?php

namespace app\controllers;

use app\support\Email;

class ContactController extends Controller
{
    public function index()
    {
        $this->view('contact', ['title' => 'Contact']);
    }


    public function store()
    {
        $email = new Email;
        $email->from()->to()->template('contact')->message()->subject()->send();
    }
}
