<?php

namespace App\Models;

use App\Interfaces\Modelling;
use PDO;
use Core\Database;

/*
 * Authentication Model
 */ 
class AuthModel implements Modelling
{
    
    public $errors;

    protected $databaseInterface;

    public function __construct(DatabaseInterface $databaseInterface)
    {
        $this->databaseInterface = $databaseInterface;
    }
    
    public static function create()
    {
        $db = static::getDb();

        $db = $this->databaseInterface->getDb();
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

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
