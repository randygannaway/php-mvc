<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 7/14/16
 * Time: 2:25 PM
 */

namespace Core;


class Dependencies
{
    protected $dependencies = [];
    
    public function __construct()
    {
        
    }

    public function addDependency($class, $params = [])
    {
        $this->dependencies[$class] = $params;
    }

    public function resolve()
    {
        
    }
}