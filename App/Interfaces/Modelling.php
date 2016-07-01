<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 6/29/16
 * Time: 4:05 PM
 */
namespace App\Interfaces;

interface Modelling
{
    /**
     * @param $data
     * @return mixed
     */
    public function create($data);
    
    public function read($data);
    
    public function update($data);
    
    public function delete($data);
}