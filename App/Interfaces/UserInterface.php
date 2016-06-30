<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 6/30/16
 * Time: 9:29 AM
 */

interface UserInterface
{
    public function create();

    public function read($email, $password);

    public function delete();
}