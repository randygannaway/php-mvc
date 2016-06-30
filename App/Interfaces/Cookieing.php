<?php
/*
 * Interface for classes storing cookies
 */
namespace App\Interfaces;

interface Cookiable
{
    public function createCookie();

    public function deleteCookie();
}