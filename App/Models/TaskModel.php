<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 7/3/16
 * Time: 2:18 PM
 */

namespace App\Models;


use App\Interfaces\Databasing;
use App\Interfaces\Modelling;

class TaskModel implements Modelling
{
    protected $database;

    public function __construct(Databasing $database)
    {
        $this->database = $database;
    }
    public function create($data)
    {
        // TODO: Implement create() method.
    }

    public function read($data)
    {
        try {

            $db = $this->database->getDb();

            $stmt = $db->prepare('SELECT t.* FROM users u JOIN tasks t ON u.id = t.for_user_id WHERE for_user_id = :user_id');
            $stmt->bindParam(':user_id', $data);
            $stmt->execute();
            $tasks = $stmt->fetchAll();

            if ($tasks !== null){
                return $tasks;
            }
        } catch (PDOException $exception) {

            echo $exception->getMessage();
        }


    }

    public function update($data)
    {
        // TODO: Implement update() method.
    }

    public function delete($data)
    {
        // TODO: Implement delete() method.
    }


}