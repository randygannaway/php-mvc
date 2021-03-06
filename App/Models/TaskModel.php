<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 7/3/16
 * Time: 2:18 PM
 */

namespace App\Models;


use App\Interfaces\Modelling;
use Core\Database;
use PDO;

class TaskModel implements Modelling
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function create($data)
    {
        $for_user_email = $data['for_user_email'];
        $task_name = $data['task_name'];
        $star_value = $data['star_value'];
        $description = $data['description'];
        $creator = $_SESSION['user']['id'];

        try {

            $db = $this->database->getDb();

            $stmt = $db->prepare('INSERT INTO tasks (task_name, task_description, created_by_id, star_value, for_user_id) SELECT 
                                    :task_name AS task_name, 
                                    :description AS task_description, 
                                    :creator AS created_by_id, 
                                    :star_value AS star_value,
                                    id FROM users WHERE email = :email');

            $stmt->bindParam(':email', $for_user_email);
            $stmt->bindParam(':task_name', $task_name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':creator', $creator);
            $stmt->bindParam(':star_value', $star_value);

            $stmt->execute();
            return true;

        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }

        return false;
    }

    public function read($column)
    {
        try {

            $db = $this->database->getDb();

            $stmt = $db->prepare("SELECT * FROM users u JOIN tasks t ON u.id = t.for_user_id WHERE $column = :user_id AND completed = 0");
            $stmt->bindParam(':user_id', $_SESSION['user']['id']);
            $stmt->execute();
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($tasks !== null){
                return $tasks;
            }
        } catch (PDOException $exception) {

            echo $exception->getMessage();
        }


    }

    public function update($task_id)
    {
        try {

            $db = $this->database->getDb();

            $stmt = $db->prepare('UPDATE tasks SET completed=1 WHERE id = :task_id');
            $stmt->bindParam(':task_id', $task_id);
            $stmt->execute();
            $tasks = $stmt->fetchAll();

            if ($tasks !== null) {
                return $tasks;
            }
        } catch (PDOException $exception) {

            echo $exception->getMessage();
        }
    }

    public function delete($task_id)
    {
        try {

            $db = $this->database->getDb();

            $stmt = $db->prepare('DELETE FROM tasks WHERE id = :task_id');
            $stmt->bindParam(':task_id', $task_id);
            $stmt->execute();

            if ($stmt == true) {
                return true;
            }
        } catch (PDOException $exception) {

            echo $exception->getMessage();
        }
    }


}