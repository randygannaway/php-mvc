<?php

/**
 * Initialisations
 */

// Register autoload function
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    $root = dirname(dirname(__FILE__)); 
    
    $file = $root . '/classes/' . $className . '.class.php';
    
    if(is_readable($file)) {
        require($file);
    } else {
        echo "File not found";
    }

// Authorisation
Auth::init();
}
