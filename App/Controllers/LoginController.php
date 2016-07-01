<?php
/**
 *
 */
namespace App\Controllers;

use App\Interfaces\Viewing;
use App\Interfaces\UserEditing;
use App\Interfaces\Cookieing;
use Core\Login;

class LoginController extends Login
{
    protected $cookieing;
    protected $viewing;
    protected $userEditing;
    protected $token;
    
    public function __construct(Viewing $viewing, UserEditing $userEditing, Cookieing $cookieing)
    {
        $this->viewing = $viewing;
        $this->userEditing = $userEditing;
        $this->cookieing = $cookieing;
    }
    
    public function index()
    {
        
        if (isset($_SESSION['user'])) {
            
            $_SESSION['message'] = 'You are already logged in.';
        }
            $this->viewing->render('User/login');

    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userEditing->read($_POST);

        if ($user !== NULL) {
var_dump($_SESSION);
            $_SESSION['user'] = $user[0];
            session_regenerate_id();

            if (isset($_POST['remember'])) {
                $this->cookieing->createCookie();
            }

            $this->viewing->render('Main/profile', $user[0]);

        } else {
            
            $_SESSION['invalid'] = true;

            $this->viewing->redirect('/error');
        }        
    }

    public function logout()
    {
        if (isset($_COOKIE['remember_token'])) {

            $this->cookieing->deleteCookie();

            setcookie('remember_token', '', time() - 3600);
    
        }

        $_SESSION = array();
        session_destroy();

        $this->viewing->redirect('/home');
    }

}
