<?php


namespace App\Controllers;

use App\Models\User;
use Core\Controller;
use Core\View;

class Signup extends Controller
{
    public function newAction()
    {
        View::renderTemplate('Signup/new.twig');
    }

    public function createAction()
    {
        $user = new User($_POST);

        if ($user->save()) {i
            $this->redirect('/signup/success');
        } else {
            View::renderTemplate('Signup/new.twig', ['user' => $user]);
        }
    }

    public function successAction()
    {
        View::renderTemplate('Signup/success.twig');
    }
}