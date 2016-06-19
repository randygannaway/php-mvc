<?php

namespace App\Controllers;

use Core\View;
use App\Models\HomeModel;

class Homes
{
    public function index()
    {
        View::render("Main/home");
    }

    public function contact()
    {
        View::render('Main/contact');
    }

}
