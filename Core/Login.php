<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 6/30/16
 * Time: 2:25 PM
 */
namespace Core;

abstract class Auth
{
    abstract public function login();

    abstract public function logout();
}