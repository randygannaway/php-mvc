<?php

namespace App\Controllers;

use App\Interfaces\LoginInterface;
use App\Interfaces\ViewInterface;
use App\Interfaces\UserInterface;
use App\Models\AuthModel;
use Core\View;

/*
 *  Authentication class
 */
class LoginController extends Auth implements LoginInterface
{
    protected $rememberLoginInterface;
    protected $viewInterface;
    protected $userInterface;
    protected $token;
    
    public function __construct(ViewInterface $viewInterface, RememberLoginInterface $rememberLoginInterface, UserInterface $userInterface)
    {
        $this->viewInterface = $viewInterface;
        $this->rememberLoginInterface = $rememberLoginInterface;
        $this->userInterface = $userInterface;
    }
    
    public function index()
    {
        if (isset($_SESSION['user'])) {
            
            $_SESSION['message'] = 'You are already logged in.';
        }
            $this->viewInterface->render('User/login');

    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userInterface->read($email, $password);

        if ($user !== NULL) {

            $_SESSION['user'] = $user[0];
            session_regenerate_id();

            if ($remember_me) {
                
                
                $this->rememberLoginInterface->create();
            }

            $this->viewInterface->render('Main/profile', $user[0]);

        } else {
            
            $_SESSION['invalid'] = true;

            View::redirect('/login');    

        }        
    }


    public function getCurrentUser()
    {
        if ($this->_currentUser === null) {
            
            if (isset($_SESSION['user_id'])) {
            
                $this->_currentUser = User::findByID($_SESSION['user_id']);
            } else {
                $this->_currentUser = $this->_loginFromCookie();
            }
        }

        return $this->_currentUser;
    }
    



    
    public function logout()
    {
        if (isset($_COOKIE['remember_token'])) {

            $this->rememberLoginInterface->delete()->forgetLogin(sha1($_COOKIE['remember_token']));

            setcookie('remember_token', '', time() - 3600);
    
        }

        $_SESSION = array();
        session_destroy();

        View::redirect('/home');
    }
    
    public function forgetLogin($token)
    {
        if ($token !== null) {


        }
    }

    
}
