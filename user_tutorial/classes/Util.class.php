<?php

/**
 * Utilities
 */

class Util
{
    public static function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }       
}
