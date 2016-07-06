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
        if (isset($_SESSION['user'])) {

            $tasks = $this->changeTasks($_SESSION['user']['id']);
            $this->view->render("User/tasks", $tasks);
        } else {
            $this->view->redirect('login');
        }
    }

    public function addTasks()
    {
        echo "what";
        $this->model->create($_POST);

        $this->view->redirect("/tasks");
    }

    public function viewTasks($for_user)
    {
        $tasks = $this->model->read($for_user);

        return $tasks;
    }

    public function changeTasks($creator)
    {
        $tasks = $this->model->update($creator);
        return $tasks;
    }

    public function deleteTasks()
    {
        var_dump($_POST['task_id']);
        $tasks = $this->model->delete($_POST['task_id']);
        return $tasks;
    }
}