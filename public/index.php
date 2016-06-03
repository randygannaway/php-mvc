<?php

// autoload classes as they are called
spl_autoload_register( function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)){
        require $file;
    }
});

// instantiate router
$router = new Core\Router();

// Add URL's to router table
$router->add('', ['controller' => 'Homes', 'action' => 'index']);
$router->add('menu', ['controller' => 'Menus', 'action' => 'index']);

// Get URL and dispatch the appropriate router and action
$url = $_SERVER['QUERY_STRING'];
$router->dispatch($url);
