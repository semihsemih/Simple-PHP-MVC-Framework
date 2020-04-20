<?php


namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller
{
    protected function before()
    {
    }

    protected function after()
    {
    }

    public function indexAction()
    {
        // echo "Hello from the index action in the Home controller!";
        View::render('Home/index.php');
    }
}