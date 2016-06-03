<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Home;

// Homes class for homepage actions
class Homes 
{
    
    // get all events and return the index for the homepage
    public function index($params = [])
    {
        
        // Get events from Home model   
        $events = Home::getAll();

        // Call Core\View to pass events to home index page
        View::renderView("Home/index.php", ['events' => $events]);
    }

}
