<?php
/**
 * Controller to add and return info on users earned stars
 */
namespace App\Controllers;

use App\Interfaces\Earning;
use App\Interfaces\Modelling;
use App\Interfaces\Viewing;
use Core\Controller;

class StarsController extends Controller implements Earning
{

    protected $viewing;
    protected $modelInterface;

    public function __construct(Viewing $viewing, Modelling $modelInterface)
    {
        $this->Viewing = $viewing;
        $this->modelInterface = $modelInterface;
    }

    public function create()
    {
        // Get stars for a user
        $stars = $this->modelInterface->read($_SESSION['user_id']);
    }

    public function read()
    {
        // Add stars to a user   
    }

    public function update()
    {
        
    }

    public function delete ()
    {
        
    }
}