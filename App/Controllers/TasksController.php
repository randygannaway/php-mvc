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
use App\Interfaces\Viewing;

class TasksController implements Tasking
{
    protected $view;
    protected $model;
    
    public function __construct(Viewing $view, Modelling $model)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function index()
    {
        $this->view->render("User/tasks");
    }

    public function addTasks()
    {
        echo "what";
        $this->model->create($_POST);

        $this->view->redirect("/dashboard");
    }

    public function viewTasks($user)
    {
        $tasks = $this->model->read($user);

        return $tasks;
    }

    public function changeTasks()
    {

    }

    public function deleteTasks()
    {
        
    }
}