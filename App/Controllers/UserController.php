<?php
/**
 * 
 */
namespace App\Controllers;

use App\Interfaces\Modelling;
use App\Interfaces\Viewing;
use App\Interfaces\UserEditing;
use App\Models\UserModel;

class UserController implements UserEditing
{
    protected $viewing;
    protected $model;

    public function __construct(Modelling $model)
    {
        $this->model = $model;
    }

    public function index()
    {
    }

    /**
     * @param array $userData
     * @return bool
     */
    public function create($userData)
    {
        $user = $this->model->create($userData);
        if ($user !== null){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $email
     * @param $password
     * @return mixed
     */
    public function read($userInfo)
    {
        $user = $this->model->read($email);

        if ($user !== null) {

            $hash = $user[0]['password'];

            // Checked hashed password
            if (password_verify($password, $hash)) {

                return $user;
            }
        }
    }
    
    /**
     * @param $user_id
     * @return mixed
     */
    public function update($user_id)
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

    /**
     * @param $user_id
     */
    public function delete($user_id)
    {
        
    }
}

