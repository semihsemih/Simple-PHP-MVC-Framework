<?php


namespace App\Controllers;


use App\Auth;
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
            Auth::login($user);

            $this->redirect(Auth::getReturnToPage());
        } else {
            View::renderTemplate('Login/new.twig', [
                'email' => $_POST['email']
            ]);
        }
    }

    public function destroyAction()
    {
        Auth::logout();

        $this->redirect('/');
    }
}