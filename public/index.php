<?php
session_start();

spl_autoload_register( function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $file;
    }
}); 

// TODO change all this to a reflection API DIC
$router = new Core\Router();
$viewer = new Core\View();
$db = new Core\Database();
$starsmodel = new App\Models\StarModel($db);
$usermodel = new \App\Models\UserModel($db);
$logincookiemodel = new \App\Models\LoginCookieModel($db);
$starscontroller = new App\Controllers\StarsController($viewer, $starsmodel);
$usercontroller = new \App\Controllers\UserController($usermodel);
$logincookiecontroller = new \App\Controllers\LoginCookieController($logincookiemodel);

// TODO add dynamic router
$router->add('', ['controller' => 'Homes', 'action' => 'index']);
$router->add('home', ['controller' => 'Homes', 'action' => 'index']);
$router->add('home/add', ['controller' => 'Homes', 'action' => 'add']);
$router->add('login', ['controller' => 'LoginController', 'action' => 'index', 'dependency1' => $usercontroller, 'dependency2' => $logincookiecontroller]);
$router->add('auth/login', ['controller' => 'LoginController', 'action' => 'login', 'dependency1' => $usercontroller, 'dependency2' => $logincookiecontroller]);
$router->add('users/signup', ['controller' => 'RegisterController', 'action' => 'index', 'dependency1' => $usercontroller]);
$router->add('users/create', ['controller' => 'RegisterController', 'action' => 'createRegistration', 'dependency1' => $usercontroller]);
$router->add('profile', ['controller' => 'ProfilesController', 'action' => 'index', 'dependency1' => $starscontroller]);
$router->add('logout', ['controller' => 'LoginController', 'action' => 'logout', 'dependency1' => $usercontroller, 'dependency2' => $logincookiecontroller]);
$router->add('contact', ['controller' => 'Homes', 'action' => 'contact']);

$router->dispatch($viewer, $_SERVER['QUERY_STRING']);
