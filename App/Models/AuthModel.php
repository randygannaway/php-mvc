<?php

namespace App\Models;

use PDO;
use Core\ModelDatabase;

/*
 * Authentication Model
 */ 
class AuthModel extends ModelDatabase
{
    
    public $errors;
    
    public static function create($userData)
    {
        $db = static::getDb();

        $name = $userData['name'];
        $email = $userData['email'];
        $password = $userData['password'];

        try {
            

            $stmt = $db->prepare('INSERT INTO users (name, email, password) 
                                  VALUES (:name, :email, :password)');

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));
            $stmt->execute();

        } catch (PDOException $exception) {
            // Log the exception message
            echo $exception->getMessage();

        }
    }

    public static function read($data, $field)
    {
        try {
            
            $db = static::getDb(); 
            $stmt = $db->prepare("SELECT * FROM users WHERE $field = :data LIMIT 1");
            $stmt->bindParam(':data', $data);
            $stmt->execute();
            $user = $stmt->fetchAll();

            if ($user !== false) {

                return $user; 
            }

        } catch (PDException $exception) {

            echo $exception->getMessage();
        }
    }

    public static function getFromCookie($token)
    {
        try {
            
            $db = static::getDb(); 
            
            $stmt= $db->prepare('SELECT u.* FROM users u JOIN remembered_logins r ON u.id = r.user_id WHERE token = :token');
            $stmt->bindParam(':token', $token);
            $stmt->execute();
            $user = $stmt->fetchAll();

            if ($user !== false) {

                return $user; 
            }

        } catch (PDException $exception) {

            echo $exception->getMessage();
        }
    }
    
    public static function setCookieToken($token, $user_id, $expiry)
    {
        try {
                
                $db = static::getDb();

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
            
        public static function delete($token)
        {
            try {
    
                $db = static::getDb();

                $stmt = $db->prepare('DELETE FROM remembered_logins WHERE token = :token');
                $stmt->execute([':token' => $token]);

            } catch (PDOException $exception) {

                echo ($exception->getMessage());
            }
        }

}
