<?php
session_start();

spl_autoload_register( function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $file;
    }
});

// TODO this needs changed now that the controllers aren't here
//if (isset($_COOKIE['remember_token'])){
//    if (isset($_SESSION['user'])){
//    } else {
//        $logincontroller->login();
//    }
//}

$dc = new Core\Dependencies();
$router = new Core\Router($dc);

// TODO add dynamic router
$router->add('',
    ['controller' => 'Home', 'action' => 'index']);
$router->add('home',
    ['controller' => 'Home', 'action' => 'index']);
$router->add('home/add',
    ['controller' => 'Home', 'action' => 'add']);
$router->add('contact',
    ['controller' => 'Home', 'action' => 'contact']);

$router->add('login',
    ['controller' => 'Login', 'action' => 'index']);
$router->add('auth/login',
    ['controller' => 'Login', 'action' => 'login']);
$router->add('logout',
    ['controller' => 'Login', 'action' => 'logout']);

$router->add('users/signup',
    ['controller' => 'Register', 'action' => 'index']);
$router->add('users/create',
    ['controller' => 'Register', 'action' => 'createRegistration']);
$router->add('profile',
    ['controller' => 'Profile', 'action' => 'index']);
$router->add('dashboard',
    ['controller' => 'Dashboard', 'action' => 'index']);

//
$router->add('tasks',
    ['controller' => 'Task', 'action' => 'index']);
$router->add('tasks/viewTasks',
    ['controller' => 'Task', 'action' => 'index']);
$router->add('tasks/addTasks',
    ['controller' => 'Task', 'action' => 'addTasks']);
$router->add('tasks/deleteTasks',
    ['controller' => 'Task', 'action' => 'deleteTasks']);
$router->add('tasks/changeTasks',
    ['controller' => 'Task', 'action' => 'changeTasks']);

$router->dispatch($_SERVER['QUERY_STRING']);
