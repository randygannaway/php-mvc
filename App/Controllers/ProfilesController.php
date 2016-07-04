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
    protected $viewing;
    protected $earnedByUserInterface;

    public function __construct(Viewing $viewing, UserEditing $userEditing)
    {
        $this->viewing = $viewing;
    }

    public function index()
    {
    $earned = [];
        if (isset($_SESSION['user'])) {
            $this->viewing->render('Main/profile', $earned );
        } else {
            $this->viewing->redirect('login');
        }

     }
    
    
}
