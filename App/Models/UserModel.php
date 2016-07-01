<?php
namespace App\Models;

use PDO;
use App\Interfaces\Modelling;
use App\Interfaces\Databasing;

/**
 * User Model
 **/
class UserModel implements Modelling
{
    public $database;

    public function __construct(Databasing $database)
    {
        $this->database = $database;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function create($data)
    {
        $db = $this->database->getDb();

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
            return true;

        } catch (PDOException $exception) {
            // Log the exception message
            echo $exception->getMessage();

        }
        return false;
    }

    public function read($email)
    {
        try {
            $db = $this->database->getDb();

            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetchAll();

            if ($user !== false) {

                return $user; 
            }

        } catch (PDOException $exception) {

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
