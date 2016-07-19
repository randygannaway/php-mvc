<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 7/14/16
 * Time: 2:25 PM
 */

namespace Core;

use App\Config;


class Dependencies
{
    protected $dependencies = Config::DEP_ARRAY;
    
    public function __construct()
    {
        
    }

    public function addDependency($class, $params = [])
    {
        $this->dependencies[$class] = $params;
    }

    public function resolve($class)
    {
        $reflector = new \ReflectionClass($class);

        $constructor = $reflector->getConstructor();

        if (!$constructor) {
            return new $class;
        }

        $params = $constructor->getParameters();

        if (count($params) === 0) {
            return new $class;
        }

        foreach ($params as $param) {
            if (isset($this->dependencies[$class][$param->getClass()->getName()])) {
                $dep = $this->dependencies[$class][$param->getClass()->getName()];
            } else {
                $dep = ucfirst($param->getClass()->getName());
            }
            $dependencies[] = $this->resolve($dep);
        }

        return $reflector->newInstanceArgs($dependencies);
    }
}