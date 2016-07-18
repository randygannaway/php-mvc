<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 7/1/16
 * Time: 8:59 AM
 */

namespace App\Controllers;

use App\Interfaces\UserEditing;
use App\Interfaces\Registering;
use Core\View;

class Register implements Registering
{
    protected $userEditing;
    protected $view;

    public function __construct(View $view, UserEditing $userEditing)
    {
        $this->userEditing = $userEditing;
        $this->view = $view;
    }

    public function index()
    {


        if (isset($_SESSION['user'])) {

            $this->view->redirect('/dashboard');
        }
        
        $this->view->render('User/signup');
    }

    public function createRegistration()
    {
        $registered = $this->userEditing->create($_POST);
        if ($registered == true) {
            $this->view->render('Main/profile');
        } else {
            $this->view->redirect('Error');
        }
    }

    public function deleteRegistration()
    {
        
    }
}