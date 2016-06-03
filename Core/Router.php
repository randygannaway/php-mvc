<?php

namespace Core;

class Router
{

    // Arrays for routes and route parameters
    protected $routes = [];

    protected $params = [];

    // Create routing table by mapping parameters to routes
    public function add($route, $params = []) 
    {
        $this->routes[$route] = $params;
    }   

    // Check that requested URL is in route table
    public function match($url)
    {
        foreach ($this->routes as $route => $params){
            if ($url == $route) {
                $this->params = $params;
                return true;
            }
        }
        
        return false;
    }

    // Instantiate requested controller and call required action method
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);
        
        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = "App\Controllers\\$controller";
            if(class_exists($controller)) {
                $controller_object = new $controller($this->params);
                
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
            echo "Router not found";
        }
    }

    // Remove query variables from URL for route matching
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
