<?php
namespace App\Models;

use PDO;
use App\Interfaces\ModelInterface;

/*
 * User Model
 */ 
class UserModel implements ModelInterface
{
    
    public $errors;
    
    public function create($data)
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

    public function read($data)
    {
        try {
            
            $db = static::getDb(); 
            $stmt = $db->prepare("SELECT * FROM users WHERE email = :data LIMIT 1");
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

    public function update($data)
    {

    }

    public function delete($data)
    {
        
    }

}
