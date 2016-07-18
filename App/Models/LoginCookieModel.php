<?php
/*
 *
 */
namespace App\Models;

use Core\Database;
use PDO;
use App\Interfaces\Modelling;

class LoginCookieModel implements Modelling
{
    protected $data;
    public $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    
    public function create($data)
    {
        try {
            $db = $this->database->getDb();

            $stmt = $db->prepare('INSERT INTO remembered_logins (token, user_id, expires_at) values (:token, :user_id, :expires_at)');
            $stmt->bindParam(':token', sha1($data['token']));
            $stmt->bindParam(':user_id', $data['id'], PDO::PARAM_INT);
            $stmt->bindParam(':expires_at', date('Y-m-d H:i:s', $data['expiry']));
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                setcookie('remember_token', $data['token'], $data['expiry'], '/');
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
    
    public function read($token)
    {
        try {

            $db = $this->database->getDb();

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

    public function update($data)
    {
        
    }

    public function delete($token)
    {
        try {

            $db = $this->database->getDb();

            $stmt = $db->prepare('DELETE FROM remembered_logins WHERE token = :token');
            $stmt->execute([':token' => $token]);

        } catch (PDOException $exception) {

            echo ($exception->getMessage());
        }
    }
}