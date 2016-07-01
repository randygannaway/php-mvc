<?php
/*
 * Interface for classes storing cookies
 */
namespace App\Interfaces;

interface Cookieing
{
    public function createCookie();

    public function deleteCookie();
}