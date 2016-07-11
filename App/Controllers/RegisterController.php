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
    protected $viewing;

    public function __construct(Viewing $viewing, UserEditing $userEditing)
    {
        $this->userEditing = $userEditing;
        $this->viewing = $viewing;
    }

    public function index()
    {


        if (isset($_SESSION['user'])) {

            $this->viewing->redirect('/dashboard');
        }
        
        $this->viewing->render('User/signup');
    }

    public function createRegistration()
    {
        $registered = $this->userEditing->create($_POST);
        if ($registered == true) {
            $this->viewing->render('Main/profile');
        } else {
            $this->viewing->redirect('Error');
        }
    }

    public function deleteRegistration()
    {
        
    }
}