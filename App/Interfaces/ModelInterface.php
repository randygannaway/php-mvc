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
    /*
     * @var $userData = array();
     */
    public function create($userData);
    
    public function read();
    
    public function update();
    
    public function delete();
}