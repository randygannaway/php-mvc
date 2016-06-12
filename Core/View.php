<?php

namespace Core;

class View
{
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view" . ".php";

        if (is_readable($file)) {
            include "../App/Views/layout.php";
        } else {
            echo "View not found";
        }
    }
}
