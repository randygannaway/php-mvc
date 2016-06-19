<?php

namespace App\Controllers;

use Core\View;
use Core\Auth;
use App\Models\UserModel;

class Users extends \Core\Controller
{
    public function __construct()
    {
    }

    public function index()
    {
    }

    public function signup()
    {
        View::render('User/signup');
    }

    public function create()
    {
        $user = UserModel::create($_POST);
        View::render('Main/profile');
    }  

}

