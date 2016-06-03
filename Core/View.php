<?php 

namespace Core;

class View
{

    public function renderView($view, $args = [])
    {
        
        // Extract variables passed to the view as an array
        extract($args, EXTR_SKIP);

        // Get layout and file paths
        $layout = dirname(__DIR__) . '/' . 'App/Views/layout.php';
        $file = dirname(__DIR__) . '/' . 'App/Views/' . $view;        
        
        // Check that file exist and extend layout
        if (is_readable($file)) {
            require $layout;
        } else {
            echo "$file not found";
        }
    }
}
