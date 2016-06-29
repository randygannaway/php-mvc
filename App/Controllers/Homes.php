<?php

namespace App\Controllers;

use Core\View;
use App\Models\HomeModel;
use App\Interfaces\ViewInterface;

class Homes
{
    public function __construct(ViewInterface $viewInterface)
    {
        $this->viewInterface = $viewInterface;
    }

    public function index()
    {
        $this->viewInterface->render("Main/home");
    }

    public function contact()
    {
        View::render('Main/contact');
    }

}
