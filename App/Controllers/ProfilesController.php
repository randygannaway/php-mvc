<?php

namespace App\Controllers;

use App\Interfaces\Earning;
use App\Interfaces\ProfilesInterface;
use App\Interfaces\UserEditing;
use Core\View;
use App\Models\HomeModel;
use App\Interfaces\Viewing;

class ProfilesController extends \Core\Controller
{
    protected $view;
    protected $earnedByUserInterface;

    public function __construct(Viewing $view, UserEditing $userEditing)
    {
        $this->view = $view;
    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            $this->view->render('Main/profile');
        } else {
            $this->view->redirect('login');
        }

     }
    
    
}
