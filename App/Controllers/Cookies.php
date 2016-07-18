<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 6/30/16
 * Time: 8:45 AM
 */
namespace App\Controllers;

use App\Interfaces\Cookieing;
use App\Interfaces\Modelling;

class Cookies implements Cookieing
{
    protected $model;

    public function __construct(Modelling $model)
    {
        $this->model = $model;

    }

    /**
     * Create and save remember token
     */
    public function create()
    {
        $data['token'] = uniqid($_SESSION['user']['email'], true);
        $data['expiry'] = time() + 60 * 60 * 24 * 30; // set expiry to 30 days from now
        $data['id'] = $_SESSION['user']['id'];

        $this->model->create($data);
    }

    /**
     * @return mixed
     */
    public function read($token)
    {
        $user = $this->model->read($token);

        if ($user !== null) {
            return $user;
        }

    }

    /**
     * Delete remember token from db
     */
    public function delete()
    {
        if (isset($_COOKIE['remember_token'])) {
            unset($_COOKIE['remember_token']);
            $this->model->delete(sha1($_COOKIE['remember_token']));
            setcookie('remember_token', '', time() - 3600, '/');
            return true;
        } else {
            return false;
        }
    }

}
