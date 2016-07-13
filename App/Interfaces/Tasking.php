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
    /**
     * @return mixed
     */
    public function addTasks();

    /**
     * @param $for_user_id
     * @return 
     */
    public function viewTasksCreated();

    public function viewTasksToComplete();
    
    /**
     * @param $creator_id
     * @return mixed
     */
    public function changeTasks();

    /**
     * @return mixed
     */
    public function deleteTasks();
}