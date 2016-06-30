<?php

namespace App\Controllers;

use App\Interfaces\EarnedByUserInterface;
use Core\View;
use App\Models\HomeModel;
use App\Interfaces\ViewInterface;

class Profiles extends \Core\Controller
{
    protected $viewInterface;
    protected $earnedByUserInterface;

    public function __construct(ViewInterface $viewInterface, EarnedByUserInterface $earnedByUserInterface)
    {
        $this->viewInterface = $viewInterface;
        $this->earnedByUserInterface = $earnedByUserInterface;
    }

    public function index()
    {
        $earned = $this->earnedByUserInterface->read();
    
//        if (isset($_SESSION['user'])) {
//            $this->viewInterface->render('Main/profile', $earned );
//        } else {
//            $this->viewInterface->redirect('auth/login');
//        }

            $this->viewInterface->render('Main/profile', $earned );
    }
    
    
}
