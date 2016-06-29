<?php

namespace App\Controllers;

use Core\View;
use App\Models\HomeModel;
use App\Interfaces\ViewInterface;

class Profiles extends \Core\Controller
{
    protected $viewInterface;

    public function __construct(ViewInterface $viewInterface)
    {
        $this->viewInterface = $viewInterface;
    }

    public function index()
    {
        $stars = HomeModel::getStars();
    
        if (isset($_SESSION['user'])) {
            $this->viewInterface->render('Main/profile', $stars );
        } else {
            $this->viewInterface->redirect('auth/login');
        }
    }
    
    
}
