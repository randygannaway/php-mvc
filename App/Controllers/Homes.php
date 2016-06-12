<?php

namespace App\Controllers;

use Core\View;
use App\Models\HomeModel;

class Homes
{
    public function index()
    {
        View::render("home");
    }


    public function add()
    {

        $stars = HomeModel::getStars();

        View::render("add", [$_GET, $stars[0]]);
    }

}
