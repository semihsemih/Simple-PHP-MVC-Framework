<?php

namespace App\Controllers;

use App\Auth;
use Core\Controller;
use Core\View;

class Items extends Controller
{
    protected function before()
    {
        $this->requireLogin();
    }

    public function indexAction()
    {
        View::renderTemplate('Items/index.twig');
    }
}