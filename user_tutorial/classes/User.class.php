<?php

/**
 *  User class
 */

class User
{

    public $errors;

    public static function signup($data)
    {
        $user = new static();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        if ($user->isValid()) {

            try {
                
                $db = Database::getInstance();
                $stmt = $db->prepare('INSERT INTO users (name, email, password) 
                                      VALUES (:name, :email, :password)');

                $stmt->bindParam(':name', $user->name);
                $stmt->bindParam(':email', $user->email);
                $stmt->bindParam(':password', Hash::make($user->password));
                $stmt->execute();
            } catch (PDOException $exception) {
                // Log the exception message
                echo $exception->getMessage();

            }
        }

        return $user;
    }

    public function emailExists($email) {
        try {
            
            $db = Database::getInstance();
        
            $stmt = $db->prepare('SELECT COUNT(*) FROM users WHERE email = :email LIMIT 1');

            $stmt->execute([':email' => $this->email]);

            $rowCount = $stmt->fetchColumn();
            return $rowCount == 1;
        } catch (PDException $exception) {

            echo $exception->getMessage();
            return false;
        }
    } 
    
    public function isValid()
    {
        $this->errors = [];

        //
        // name
        //
        if ($this->name == '') {
            $this->errors['name'] = 'Please enter a valid name';
        }

        //
        // email 
        //
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors['email'] = 'Please enter a valid email address';
        }

        if ($this->emailExists($this->email)) {
            $this->errors['email'] = 'That email is already registerd';
        }

        //
        // password
        //
        if (strlen($this->password) < 5) {
            $this->errors['password'] = 'Please enter at 5 characters for a password';
        }
        
        return empty($this->errors);
    }  

    public static function authenticate($email, $password)
    {
        $user = static::findByEmail($email);
echo "User.authenticate" . var_dump($user) . "<br>";
        if ($user !== null) {
        
            // Checked hashed password
            if (Hash::check($password, $user->password)) {
                return $user;
            }
        }
    }

    public static function findByEmail($email) {
        
        try { 
        
            $db = Database::getInstance();

            $stmt = $db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
            $stmt->execute([':email' => $email]);

            $user = $stmt->fetchObject('user');

            if ($user !== false) {
        
                return $user;
            } 
        }   catch (PDOException $exception) {

            echo $exception->getMessage();
        }
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
