<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 7/3/16
 * Time: 2:11 PM
 */
namespace App\Interfaces;

interface Tasking
{
    public function addTasks();

    public function viewTasks();

    public function changeTasks();

    public function deleteTasks();
}