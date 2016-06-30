<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 6/29/16
 * Time: 3:40 PM
 */
namespace App\Interfaces;

interface EarnedByUserInterface
{
    public function create();
    
    public function read();
    
    public function update();
    
    public function delete();
    
}