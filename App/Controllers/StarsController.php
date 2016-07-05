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
    protected $model;

    public function __construct(Viewing $view, Modelling $model)
    {
        $this->viewing = $view;
        $this->model = $model;
    }

    public function earn()
    {
    }

    public function retrieve()
    {
        $stars = $this->model->read($_SESSION['user']);
        return $stars;
    }

    public function spend()
    {
        
    }

}