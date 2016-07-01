<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 6/30/16
 * Time: 2:55 PM
 */

namespace App\Interfaces;


interface UserEditing
{

    /**
     * @param array $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param $data
     */
    public function read($data);

    /**
     * @param $user_id
     */
    public function update($data);
    
    /**
     * @param $user_id
     */
    public function delete($data);
}