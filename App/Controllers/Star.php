<?php
/**
 * Controller to add and return info on users earned stars
 */
namespace App\Controllers;

use App\Interfaces\Earning;
use App\Interfaces\Modelling;
use Core\View;

class Star implements Earning
{
    protected $viewing;
    protected $model;

    public function __construct(View $view, Modelling $model)
    {
        $this->viewing = $view;
        $this->model = $model;
    }

    public function earn()
    {

    }

    public function retrieve()
    {
        $stars = $this->model->read($_SESSION['user']['id']);
        return $stars;
    }

    public function spend()
    {
        
    }
}