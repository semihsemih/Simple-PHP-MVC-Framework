<?php


namespace App\Controllers;

use Core\Controller;
use \Core\View;

class Home extends Controller
{
    protected function before()
    {
    }

    protected function after()
    {
    }

    public function indexAction()
    {
        View::renderTemplate('Home/index.twig');
    }
}