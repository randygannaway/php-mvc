<?php

namespace App\Controllers;

use Core\View;
use Core\Auth;
use App\Models\UserModel;

class Users extends \Core\Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        View::render('User/login');
    }

    public function signup()
    {
        View::render('User/signup');
    }

    public function create()
    {
        $user = UserModel::create($_POST);
        View::render('Main/profile');
    }  


    public static function findByEmail($email) {
        
            $db = UserModel::read($email);
        
    }

    public static function findByID($id)
    {
        try {
        
            $db = Database::getInstance();
            $stmt = $db->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
            $stmt->execute([':id' => $id]);
            $user = $stmt->fetchObject('User');

            if ($user !== false) {
            
                return $user;
            }
        } catch (PDOException $exception) {
       
            echo $exception->getMessage();
        }
    } 

    public function rememberLogin($expiry)
    {
        
        // Generate unique token
        $token = uniqid($this->email, true);

        try {
            
            $db = Database::getInstance();

            $stmt = $db->prepare('INSERT INTO remembered_logins (token, user_id, expires_at) values (:token, :user_id, :expires_at)');
            $stmt->bindParam(':token', sha1($token));
            $stmt->bindParam(':user_id', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':expires_at', date('Y-m-d H:i:s', $expiry));
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
            
                return $token;
            }
    
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function findByRememberToken($token)
    {
    
        try {

            $db = Database::getInstance();

            $stmt= $db->prepare('SELECT u.* FROM users u JOIN remembered_logins r ON u.id = r.user_id WHERE token = :token');
            $stmt->execute([':token' => $token]);
            $user = $stmt->fetchObject('User');

            if ($user !== false) {

                return $user;
            }
        } catch (PDOEXception $exception) {
            echo $exception->getMessage();
        }
    }

    public function forgetLogin($token)
    {
        if ($token !== null) {

            try {
    
                $db = Database::getInstance();

                $stmt = $db->prepare('DELETE FROM remembered_logins WHERE token = :token');
                $stmt->execute([':token' => $token]);

            } catch (PDOException $exception) {

                echo ($exception->getMessage());
            }
        }
    }
}

