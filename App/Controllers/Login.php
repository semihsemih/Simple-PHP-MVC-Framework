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
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user->id;
            $this->redirect('/');
        } else {
            View::renderTemplate('Login/new.twig', [
                'email' => $_POST['email']
            ]);
        }
    }

    public function destroyAction()
    {
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();

        $this->redirect('/');
    }
}