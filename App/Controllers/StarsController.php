<?php
/**
 * Controller to add and return info on users earned stars
 */
namespace App\Controllers;

use App\Interfaces\EarnedByUserInterface;
use App\Interfaces\ModelInterface;
use App\Interfaces\ViewInterface;
use App\Models\EarnedByUserModel;
use Core\Controller;
use App\Models\StarModel;

class StarsController extends Controller implements EarnedByUserInterface
{

    protected $viewInterface;
    protected $modelInterface;

    public function __construct(ViewInterface $viewInterface, ModelInterface $modelInterface)
    {
        $this->viewInterface = $viewInterface;
        $this->modelInterface = $modelInterface;
    }

    public function create()
    {
        // Add stars to a user   
    }
    
    public function read()
    {
        // Get stars for a user
        $stars = $this->modelInterface->read();
    }
    
    public function update()
    {
        // Spend stars for permission to do something
    }
    
    public function delete()
    {
        
    }
}