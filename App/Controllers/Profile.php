<?php

namespace App\Controllers;

use App\Interfaces\UserEditing;
use Core\View;

class Profile
{
    protected $view;
    protected $earnedByUserInterface;

    public function __construct(View $view, UserEditing $userEditing)
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
