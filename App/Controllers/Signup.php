<?php


namespace App\Controllers;

use App\Models\User;
use Core\Controller;
use Core\View;

class Signup extends Controller
{
    public function newAction()
    {
        View::renderTemplate('Signup/new.html');
    }

    public function createAction()
    {
        $user = new User($_POST);

        $user->save();

        View::renderTemplate('Signup/success.html');
    }
}