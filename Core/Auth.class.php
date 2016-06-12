<?php

/*
 *  Authentication class
 */

class Auth
{
    private static $_instance; 

    private function __construct() {}

    private function __clone() {}

    /*
     * Initialixation
     *
     * @return void
     */
    public static function init()
    {
        // Start or resume session
        session_start();
    }

    public static function getInstance()
    {
        if(static::$_instance === NULL) {
            static::$_instance = new Auth();
        }

        return static::$_instance;
    }

    public function login($email, $password, $remember_me)
    {
echo $email . $password . $remember_me . "<br>";
        $user = User::authenticate($email, $password);
 echo "Auth.login" . var_dump($user) . "<br>";
        if ($user !== NULL) {
            
            $this->_currentUser = $user;

            $this->_loginUser($user);

            if ($remember_me) {
        
                $expiry = time() + 60 * 60 * 24 * 30; // set expiry to 30 days from now

                $token = $user->rememberLogin($expiry);

                if ($token !== false) {
                    
                    setcookie('remember_token', $token, $expiry);
                }
            }

            return true;
        }

        return false;
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

    public function isLoggedIn()
    {
        return $this->getCurrentUser() !== null;
    }

    public function logout()
    {
        if (isset($_COOKIE['remember_token'])) {

            $this->getCurrentUser()->forgetLogin(sha1($_COOKIE['remember_token']));

            setcookie('remember_token', '', time() - 3600);
    
        }

        $_SESSION = array();
        session_destroy();
    }

    public function requireLogin()
    {
        if ( ! $this->isLoggedIn()) {
            
            $url = $_SERVER['REQUEST_URI'];
            if ( ! empty($url)) {
                $_SESSION['return_to'] = $url;
            }

            Util::redirect('/login.php');
        }
    }

    public function requireGuest()
    {
        if ($this->isLoggedIn()) {
            Util::redirect('/index.php');
        }
    }

    public function _loginFromCookie() {
    
        if (isset($_COOKIE['remember_me'])){ 

            $user = User::findByRememberToken(sha1($_COOKIE['remember_token']));

            if ($user !== null) {

                $this->_loginUser($user);
                return $user;
            }
        }
    }

    private function _loginUser($user)
    {
        $_SESSION['user_id'] = $user->id;

        session_regenerate_id();
    }
}   
