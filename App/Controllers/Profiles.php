<?php

namespace App\Controllers;

use Core\View;

class Profiles extends \Core\Controller
{
    public function index()
    {
        View::render('profile');
    }
}
