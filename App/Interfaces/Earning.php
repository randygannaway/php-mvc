<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 6/29/16
 * Time: 3:40 PM
 */
namespace App\Interfaces;

interface Earning
{
    public function earn();
    
    public function retrieve();
    
    public function spend();
    
}