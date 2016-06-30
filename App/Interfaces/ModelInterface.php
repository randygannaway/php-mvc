<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 6/29/16
 * Time: 4:05 PM
 */
namespace App\Interfaces;

interface ModelInterface
{
    public function create();
    
    public function read();
    
    public function update();
    
    public function delete();
}