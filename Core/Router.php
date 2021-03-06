<?php

namespace Core;

use App\Interfaces\Viewing;
use Core\Auth;


class Router
{
    
    protected $routes = [];

    protected $params = [];

    public function __construct(Dependencies $dependencies)
    {
        $this->dependencies = $dependencies;
    }
    
    public function add($route, $params = []) 
    {
        $this->routes[$route] = $params;
    }

    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if ($url == $route) {
                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);


        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = "App\\Controllers\\$controller";

          if (class_exists($controller)) {
//              $controller_object = new $controller($this->params);

              $controller_object = $this->dependencies->resolve($controller);

              $action = $this->params['action'];

                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                } else {
                    echo "Method $action in $controller not found";
                }
            } else {
                echo "$controller not found";
            }
        } else {
            "Route not found";
        }
    }

    public function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }

        return $url;
    }
}
