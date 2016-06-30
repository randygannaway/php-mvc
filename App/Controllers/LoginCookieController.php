<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 6/30/16
 * Time: 8:45 AM
 */
namespace App\Controllers;

use App\Interfaces\Cookiable;
use App\Interfaces\ModelInterface;
use Core\Login;

class LoginCookieController extends Login implements Cookieing
{
    protected $modelInterface;

    public function __construct(ModelInterface $modelInterface)
    {
        $this->modelInterface = $modelInterface;
    }

    /**
     *
     */
    public function createCookie()
    {
]       $userData['token'] = uniqid($_SESSION['email'], true);
        $userData['expiry'] = time() + 60 * 60 * 24 * 30; // set expiry to 30 days from now
        $userData['id'] = $_SESSION(['id']);
        
        $this->modelInterface->create($userData);
        
    }

    /**
     *
     */
    public function deleteCookie()
    {
        // TODO: Implement deleteCookie() method.
    }

    public function login()
    {
        if (isset($_COOKIE['remember_me'])){

            $user = AuthModel::getFromCookie(sha1($_COOKIE['remember_token']));

            if ($user !== null) {

                $this->_loginUser($user);
                return $user;
            }
        }
    }

    public function logout($token)
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
