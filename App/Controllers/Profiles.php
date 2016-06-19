<?php

namespace App\Controllers;

use Core\View;
use App\Models\HomeModel;

class Profiles extends \Core\Controller
{
    public function index()
    {
        $stars = HomeModel::getStars();
    
        if (isset($_SESSION['user'])) {
            View::render('Main/profile', $stars/* );
        } else {
            View::redirect('auth/login');
        }
    }
    
    
}
