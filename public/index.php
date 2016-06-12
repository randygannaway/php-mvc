<?php

spl_autoload_register( function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $file;
    }
}); 

$router = new Core\Router();

$router->add('', ['controller' => 'Homes', 'action' => 'index']);
$router->add('home/add', ['controller' => 'Homes', 'action' => 'add']);

$router->dispatch($_SERVER['QUERY_STRING']);
