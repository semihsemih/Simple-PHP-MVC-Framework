<?php


namespace App\Controllers;

use Core\Controller;
use Core\View;

class Signup extends Controller
{
    public function newAction()
    {
        View::renderTemplate('Signup/new.html');
    }
}