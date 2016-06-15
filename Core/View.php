<?php

namespace Core;

use App\Config;

class View
{
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $file = dirname(__DIR__) . "/App/Views/$view" . ".php";

        if (is_readable($file)) {
            include $file;
        } else {
            echo "View not found";
        }
    }


    public static function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }       
}
