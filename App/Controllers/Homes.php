<?php

namespace App\Controllers;

use Core\View;
use App\Models\HomeModel;
use App\Interfaces\Viewing;

class Homes
{
    protected $viewing;
    
    public function __construct(Viewing $viewing)
    {
        $this->Viewing = $viewing;
    }

    public function index()
    {
        $this->Viewing->render("Main/home");
    }

    public function contact()
    {
        $this->Viewing->render('Main/contact');
    }

}
