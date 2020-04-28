<?php

namespace App\Controllers;

use App\Auth;
use Core\Controller;
use Core\View;

class Items extends Controller
{
    public function indexAction()
    {
        if (!Auth::isLoggedIn())
            $this->redirect('/login');

        View::renderTemplate('Items/index.twig');
    }
}