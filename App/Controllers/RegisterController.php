<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 7/1/16
 * Time: 8:59 AM
 */

namespace App\Controllers;

use App\Interfaces\UserEditing;
use App\Interfaces\Viewing;
use App\Interfaces\Registering;

class RegisterController implements Registering
{
    protected $userEditing;
    protected $viewer;

    public function __construct(Viewing $viewer, UserEditing $userEditing)
    {
        $this->userEditing = $userEditing;
        $this->viewer = $viewer;
    }

    public function index()
    {
        $this->viewer->render('User/signup');
    }

    public function createRegistration()
    {
        $registered = $this->userEditing->create($_POST);
        if ($registered == true) {
            $this->viewer->render('Main/profile');
        } else {
            $this->viewer->redirect('Error');
        }
    }

    public function deleteRegistration()
    {
        
    }
}