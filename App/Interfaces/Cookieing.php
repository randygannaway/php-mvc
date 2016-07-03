<?php
/*
 * Interface for classes storing cookies
 */
namespace App\Interfaces;

interface Cookieing
{
    public function create();

    public function read($token);

    public function delete();
}