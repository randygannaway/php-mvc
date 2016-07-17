<?php
session_start();

spl_autoload_register( function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $file;
    }
}); 

$db = new Core\Database();

$dc = new Core\Dependencies();

$router = new Core\Router($dc);


//$starsmodel = new App\Models\StarModel($db);
//$usermodel = new \App\Models\UserModel($db);
//$logincookiemodel = new \App\Models\LoginCookieModel($db);
//$taskmodel = new \App\Models\TaskModel($db);
//
//$starscontroller = new App\Controllers\StarsController($viewer, $starsmodel);
//$usercontroller = new \App\Controllers\User($usermodel);
//$cookiecontroller = new \App\Controllers\Cookies($logincookiemodel);
//$logincontroller = new \App\Controllers\Login($viewer, $usercontroller, $cookiecontroller);
//$taskscontroller = new \App\Controllers\TasksController($viewer, $taskmodel);


// TODO add dynamic router
$router->add('', ['controller' => 'Homes', 'action' => 'index']);
$router->add('home', ['controller' => 'Homes', 'action' => 'index']);
$router->add('home/add', ['controller' => 'Homes', 'action' => 'add']);
//$router->add('login', ['controller' => 'Login', 'action' => 'index']);
//$router->add('auth/login', ['controller' => 'Login', 'action' => 'login']);
//$router->add('users/signup', ['controller' => 'RegisterController', 'action' => 'index', 'dependency1' => $usercontroller]);
//$router->add('users/create', ['controller' => 'RegisterController', 'action' => 'createRegistration', 'dependency1' => $usercontroller]);
//$router->add('profile', ['controller' => 'ProfilesController', 'action' => 'index', 'dependency1' => $usercontroller, 'dependency2' => $taskscontroller]);
//$router->add('logout', ['controller' => 'Login', 'action' => 'logout', 'dependency1' => $usercontroller, 'dependency2' => $cookiecontroller]);
//$router->add('contact', ['controller' => 'Homes', 'action' => 'contact']);
//$router->add('dashboard', ['controller' => 'DashboardController', 'action' => 'index', 'dependency1' => $starscontroller, 'dependency2' => $taskscontroller]);
//
//$router->add('tasks', ['controller' => 'TasksController', 'action' => 'index', 'dependency1' => $taskmodel,]);
//$router->add('tasks/viewTasks', ['controller' => 'TasksController', 'action' => 'index', 'dependency1' => $taskmodel,]);
//$router->add('tasks/addTasks', ['controller' => 'TasksController', 'action' => 'addTasks', 'dependency1' => $taskmodel,]);
//$router->add('tasks/deleteTasks', ['controller' => 'TasksController', 'action' => 'deleteTasks', 'dependency1' => $taskmodel,]);
//$router->add('tasks/changeTasks', ['controller' => 'TasksController', 'action' => 'changeTasks', 'dependency1' => $taskmodel,]);

if (isset($_COOKIE['remember_token'])){
    if (isset($_SESSION['user'])){
    } else {
        $logincontroller->login();
    }
}
$router->dispatch($_SERVER['QUERY_STRING']);
