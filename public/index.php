<?php

spl_autoload_register( function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)){
        require $file;
    }
});

$router = new Core\Router();

$router->add('', ['controller' => 'Homes', 'action' => 'index']);
$router->add('menu', ['controller' => 'Menus', 'action' => 'index']);

$url = $_SERVER['QUERY_STRING'];
$router->dispatch($url);
