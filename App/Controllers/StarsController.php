<?php
/**
 * Controller to add and return info on users earned stars
 */
namespace App\Controllers;

use App\Interfaces\EarnedByUserInterface;
use App\Interfaces\ModelInterface;
use App\Interfaces\ViewInterface;
use Core\Controller;

class StarsController extends Controller implements EarnedByUserInterface
{

    protected $viewInterface;
    protected $modelInterface;

    public function __construct(ViewInterface $viewInterface, ModelInterface $modelInterface)
    {
        $this->viewInterface = $viewInterface;
        $this->modelInterface = $modelInterface;
    }

    public function count()
    {
        // Get stars for a user
        $stars = $this->modelInterface->read($_SESSION['user_id']);
    }

    public function earn()
    {
        // Add stars to a user   
    }

    public function spend()
    {
        
    }
}