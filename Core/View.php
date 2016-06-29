<?php

namespace Core;

use App\Config;
use App\Interfaces\ViewInterface;


class View implements ViewInterface
{

    public function render($view, $args = [])
    {
    
    
        extract($args, EXTR_SKIP);
        
        $file = dirname(__DIR__) . "/App/Views/$view" . ".php";

        if (is_readable($file)) {
            include $file;
        } else {
            echo "View not found";
        }
    }


    public function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }       
}
