<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 6/29/16
 * Time: 12:54 PM
 */
namespace App\Interfaces;

interface ViewInterface
{
    public function render($view, $args = []);

    public function redirect($url);
}