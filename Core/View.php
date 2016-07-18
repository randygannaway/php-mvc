<?php

namespace Core;

class View
{

    /**
     * @param $view
     * @param array $args
     */
    public function render($view, $args = [])
    {
        if ($args !== null) {
            extract($args, EXTR_SKIP);
        }
        
        $file = dirname(__DIR__) . "/App/Views/$view" . ".php";

        if (is_readable($file)) {
            include $file;
        } else {
            echo "View not found";
        }
    }

    /**
     * @param $url
     */
    public function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }       
}
