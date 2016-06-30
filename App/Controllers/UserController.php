<?php

namespace App\Controllers;

use App\Interfaces\EarnedByUserInterface;
use App\Interfaces\ModelInterface;
use App\Interfaces\ViewInterface;
use App\Interfaces\UserInterface;
use App\Models\UserModel;
use Core\Controller;
use App\Models\UserModel;

class UserController implements UserInterface
{
    protected $viewInterface;
    protected $modelInterface;

    public function __construct(ViewInterface $viewInterface, ModelInterface $modelInterface)
    {
        $this->viewInterface = $viewInterface;
        $this->modelInterface = $modelInterface;
    }

    public function index()
    {
    }

    public function read($email, $password)
    {
        $user = $this->modelInterface->read($email, 'email');

        if ($user !== null) {

            $hash = $user[0]['password'];

            // Checked hashed password
            if (password_verify($password, $hash)) {

                return $user;
            }
        }
    }

    public function signup()
    {
    }

    public function create()
    {
        $user = UserModel::create($_POST);
        $this->viewInterface->render('Main/profile');
    }  

}

