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
        $user = User::authenticate($_POST['email'], $_POST['password']);

        if ($user) {
            $this->redirect('/');
        } else {
            View::renderTemplate('Login/new.twig', [
                'email' => $_POST['email']
            ]);
        }
    }
}