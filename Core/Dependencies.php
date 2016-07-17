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
//        var_dump($this->dependencies);
    }

    public function resolve($class)
    {
        echo "Class ".$class . "<br>";
        $reflector = new \ReflectionClass($class);

        $constructor = $reflector->getConstructor();
        echo $constructor . "<br>";

        if (!$constructor){
            return new $class;
        }

        $params = $constructor->getParameters();
        echo "Params " . var_dump($params) . "<br>";

        if (count($params) === 0){
            return new $class;
        }

        foreach ($params as $param) {
            echo "PAram " . $param->getClass()->getName() . "<br>";
            echo "Dependencies " . var_dump($this->dependencies) . "<br>";
            if (isset($this->dependencies[$class][$param->getClass()->getName()])) {
                $dep = $this->dependencies[$class][$param->getClass()->getName()];
                echo "Dep " . $dep . "<br>";
            } else {

                $dep = ucfirst($param->getClass()->getName());
                echo "else Dep " . $dep . "<br>";

            }
            $dependencies[] = $this->resolve($dep);
        }

        return $reflector->newInstanceArgs($dependencies);
    }
}