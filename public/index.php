<?php
session_start();

spl_autoload_register( function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $file;
    }
}); 

$router = new Core\Router();

$router->add('', ['controller' => 'Homes', 'action' => 'index']);
$router->add('home', ['controller' => 'Homes', 'action' => 'index']);
$router->add('home/add', ['controller' => 'Homes', 'action' => 'add']);
$router->add('login', ['controller' => 'Auths', 'action' => 'index']);
$router->add('auth/login', ['controller' => 'Auths', 'action' => 'login']);
$router->add('users/signup', ['controller' => 'Users', 'action' => 'signup']);
$router->add('users/create', ['controller' => 'Users', 'action' => 'create']);
$router->add('profile', ['controller' => 'Profiles', 'action' => 'index']);
$router->add('auth/logout', ['controller' => 'Auths', 'action' => 'logout']);
$router->add('contact', ['controller' => 'Homes', 'action' => 'contact']);

$viewer = new Core\View();
$router->dispatch($viewer, $_SERVER['QUERY_STRING']);
