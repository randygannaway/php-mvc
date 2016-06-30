<?php
/*
 *
 */
namespace App\Models;

use PDO;
use App\Interfaces\ModelInterface;

class RememberModel implements ModelInterface
{
    protected $userData;
    
    public function create($userData)
    {
        $this->userData = $userData;

        try {

            $db = static::getDb();

            $stmt = $db->prepare('INSERT INTO remembered_logins (token, user_id, expires_at) values (:token, :user_id, :expires_at)');
            $stmt->bindParam(':token', sha1($userData['token']));
            $stmt->bindParam(':user_id', $userData['id'], PDO::PARAM_INT);
            $stmt->bindParam(':expires_at', date('Y-m-d H:i:s', $userData['expiry']));
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                setcookie('remember_token', $userData['token'], $userData['expiry']);
                return true;
            } else {
                return false;
            }
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
    
    public function read($user_id)
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
}