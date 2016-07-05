<?php
/*
 * Interface for classes storing cookies
 */
namespace App\Interfaces;

interface Cookieing
{
    /**
     * @return mixed
     */
    public function create();

    /**
     * @param $token
     * @return mixed
     */
    public function read($token);

    /**
     * @return mixed
     */
    public function delete();
}