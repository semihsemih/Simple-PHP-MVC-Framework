<?php


namespace App\Controllers;


use App\Models\User;
use Core\Controller;
use Core\View;

class Login extends Controller
{
    public function newAction()
    {
        View::renderTemplate('Login/new.twig');
    }

    public function createAction()
    {
        $user = User::findByEmail($_POST['email']);
        var_dump($user);
    }
}