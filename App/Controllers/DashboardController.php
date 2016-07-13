<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 7/3/16
 * Time: 9:30 AM
 */

namespace App\Controllers;

use App\Interfaces\Viewing;
use App\Interfaces\Earning;
use App\Interfaces\Tasking;

class DashboardController
{
    protected $view;

    public function __construct(Viewing $view, Earning $earning, Tasking $tasks)
    {
        $this->view = $view;
        $this->earning = $earning;
        $this->tasks = $tasks;
    }

    public function index()
    {
        if (isset($_SESSION['user'])) {

            $earned = $this->earning->retrieve();
            $tasks = $this->tasks->viewTasksToComplete($_SESSION['user']['id']);

            $this->view->render("User/dashboard", [$earned, $tasks]);
        } else {
            $this->view->redirect("/login");
        }
    }
    
}
