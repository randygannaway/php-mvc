<?php

namespace App\Controllers;

use Core\View;
use App\Models\HomeModel;

class Home
{
    protected $view;
    
    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function index()
    {
        $this->view->render("Main/home");
    }

    public function contact()
    {
        $this->view->render('Main/contact');
    }

}
