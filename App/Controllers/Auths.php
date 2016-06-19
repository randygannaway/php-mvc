<?php

namespace App\Controllers;

use App\Models\AuthModel;
use Core\View;

/*
 *  Authentication class
 */
class Auths
{

    public function __construct() {}

    public function __clone() {}

    public function index()
    {
        if (isset($_SESSION['user'])) {
            
            $_SESSION['message'] = 'You are already logged in.';
        }
            View::render('User/login');

    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->authenticate($email, $password);

        if ($user !== NULL) {
            
            $this->_currentUser = $user;

            $this->_loginUser($user);

            if ($remember_me) {
        
                $expiry = time() + 60 * 60 * 24 * 30; // set expiry to 30 days from now

                $token = $this->rememberLogin($expiry);

                if ($token !== false) {
                    
                    setcookie('remember_token', $token, $expiry);
                }
            }

            $_SESSION['user'] = $user[0];
            View::render('Main/profile', $user[0]);

        } else {
            
            $_SESSION['invalid'] = true;

            View::redirect('/login');    

        }        
    }

    public static function authenticate($email, $password)
    {
        $user = AuthModel::read($email, 'email');

        if ($user !== null) {
        
            $hash = $user[0]['password'];

            // Checked hashed password
            if (password_verify($password, $hash)) {

                return $user;
            }
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

    // Check if the user is already logged in, stored in session
//     public function isLoggedIn()
//     {
//         if (isset($_SESSION['user'])) {
//             return true;
//         } 
// 
//         return false;
//     }

        // 
    private function _loginUser($user)
    {
        $_SESSION['user_id'] = $user[0]['id'];
        session_regenerate_id();
    }
    
    // Login from remember_me cookie 
    public function _loginFromCookie() {
    
        if (isset($_COOKIE['remember_me'])){ 

            $user = AuthModel::getFromCookie(sha1($_COOKIE['remember_token']));

            if ($user !== null) {

                $this->_loginUser($user);
                return $user;
            }
        }
    }

    private function rememberLogin($expiry)
    {
        
        // Generate unique token
        $token = uniqid($this->email, true);
        $user_id = $_SESSION(['id']);
        
        $token = AuthModel::setCookieToken($token, $user_id, $expiry);
        
        return $token;
    }
    
    public function logout()
    {
        if (isset($_COOKIE['remember_token'])) {

            $this->getCurrentUser()->forgetLogin(sha1($_COOKIE['remember_token']));

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
