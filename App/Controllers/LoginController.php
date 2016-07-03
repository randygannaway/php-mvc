<?php
/**
 *
 */
namespace App\Controllers;

use App\Interfaces\Cookieing;
use App\Interfaces\Viewing;
use App\Interfaces\UserEditing;
use App\Interfaces\LoggingIn;

class LoginController implements LoggingIn
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
        if (isset($_COOKIE['remember_token'])) {

            // Find user that has the token set (the token is hashed in the database)
            $user = $this->cookieing->read(sha1($_COOKIE['remember_token']));
        } else {

            $user = $this->userEditing->read($_POST);
        }

        if ($user !== NULL) {

            $_SESSION['user'] = $user[0];

            if (isset($_POST['remember'])) {
                $this->cookieing->create();
            }

            $this->viewing->redirect('/profile');
        } else {

            $_SESSION['invalid'] = true;
            $this->viewing->redirect('/error');
        }
    }
    public function logout()
    {

        $_SESSION = array();
        session_destroy();

        $this->cookieing->delete();


        $this->viewing->redirect('/home');
    }

}
