<?php
/**
 *
 */
namespace App\Controllers;

use App\Interfaces\Cookieing;
use App\Interfaces\UserEditing;
use App\Interfaces\LoggingIn;
use Core\View;

class Login implements LoggingIn
{
    protected $cookieing;
    protected $view;
    protected $userEditing;
    protected $token;
    
    public function __construct(View $view, UserEditing $userEditing, Cookieing $cookieing)
    {
        $this->view = $view;
        $this->userEditing = $userEditing;
        $this->cookieing = $cookieing;
    }
    
    public function index()
    {
        
        if (isset($_SESSION['user'])) {
            
            $this->view->redirect('/dashboard');
        }
            $this->view->render('User/login');

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

            $this->view->redirect('/dashboard');
        } else {

            $_SESSION['invalid'] = true;
            $this->view->redirect('/error');
        }
    }
    public function logout()
    {

        $_SESSION = array();
        session_destroy();

        $this->cookieing->delete();


        $this->view->render('Main/loggedout');
    }

}
