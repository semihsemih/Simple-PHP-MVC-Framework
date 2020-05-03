<?php

namespace App\Controllers;

use App\Models\User;
use Core\Controller;
use Core\View;

class Password extends Controller
{
    public function forgotAction()
    {
        View::renderTemplate('Password/forgot.twig');
    }

    public function requestResetAction()
    {
        User::sendPasswordReset($_POST['email']);

        View::renderTemplate('Password/reset_requested.twig');
    }
}