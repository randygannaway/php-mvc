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

            $tasks = $this->viewTasksCreated();
            $this->view->render("User/tasks", $tasks);
        } else {
            $this->view->redirect('login');
        }
     }

    public function addTasks()
    {
        $this->model->create($_POST);

        $this->view->redirect("/tasks");
    }

    public function viewTasksCreated()
    {
        $tasks = $this->model->read($user = 'created_by_id');

        return $tasks;
    }


    public function viewTasksToComplete()
    {
        $tasks = $this->model->read($user = 'for_user_id');

        return $tasks;
    }


    public function changeTasks()
    {

        $this->model->update($_POST['task_id']);

        $this->view->redirect("/dashboard");

    }

    public function deleteTasks()
    {
        $this->model->delete($_POST['task_id']);

        $this->view->redirect("/tasks");
    }
}