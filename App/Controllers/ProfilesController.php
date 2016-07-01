<?php

namespace App\Controllers;

use App\Interfaces\Earning;
use Core\View;
use App\Models\HomeModel;
use App\Interfaces\Viewing;

class ProfilesController extends \Core\Controller
{
    protected $viewing;
    protected $earnedByUserInterface;

    public function __construct(Viewing $viewing, Earning $earnedByUserInterface)
    {
        $this->Viewing = $viewing;
        $this->earnedByUserInterface = $earnedByUserInterface;
    }

    public function index()
    {
        $earned = $this->earnedByUserInterface->read();
    
//        if (isset($_SESSION['user'])) {
//            $this->Viewing->render('Main/profile', $earned );
//        } else {
//            $this->Viewing->redirect('auth/login');
//        }

            $this->Viewing->render('Main/profile', $earned );
    }
    
    
}
