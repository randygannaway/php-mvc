<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 7/3/16
 * Time: 2:06 PM
 */

namespace App\Controllers;

use App\Interfaces\Modelling;
use App\Interfaces\Tasking;

class TasksController implements Tasking
{
    protected $view;
    protected $model;
    
    public function __construct(Modelling $model)
    {
        $this->model = $model;
    }

    public function addTasks()
    {
        
    }

    public function viewTasks()
    {
        $tasks = $this->model->read($_SESSION['user']['id']);

        return $tasks;
    }

    public function changeTasks()
    {
        
    }

    public function deleteTasks()
    {
        
    }
}