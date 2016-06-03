<?php

namespace Core;

use App\Config;
use PDO;

// Base model 
class Model
{

        // Create a static reusable connection for other models
        protected static function getDB()
        {
            static $db = null;

            if ($db === null) {
                try {

                    // Connect to db using PDO        
                    $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';

                    $db = new PDO($dsn, Config::DB_USER, Config::DB_PASS);

                    return $db;

                } catch (PDOException $e) {
            
                    // Return error messages from failed connection
                    echo $e->getMessage();
                }
            }
}
}
