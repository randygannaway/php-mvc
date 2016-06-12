<?php

/*
 * Database class
 */

class Database
{

    private static $_db; 

    private function __construct() {} // Disallows creating a new object with a new database???

    private function __clone() {}

    /**
     * Get the instance of the PDO connection 
     *
     * @return DB PDO connection
     */
    public static function getInstance()
    {
        if (static::$_db === NULL) {
            $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';

            static::$_db = new PDO($dsn, Config::DB_USER, Config::DB_PASS);

            static::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }

        return static::$_db;
    }

}
