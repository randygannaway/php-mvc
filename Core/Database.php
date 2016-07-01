<?php

namespace Core;

use App\Interfaces\Databasing;
use PDO;
use App\Config;

class Database implements Databasing
{
 
    public function getDb() {
    
        static $db = null;

        if ($db === null) {
            try {
                $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' .
                Config::DB_NAME . ';charset=utf8';     

                $db = new PDO($dsn, Config::DB_USER, Config::DB_PASS);

                return $db;                

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } 
    }   
}
