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

    public function resetAction()
    {
        $token = $this->route_params['token'];

        $user = $this->getUserOrExit($token);

        View::renderTemplate('Password/reset.twig', [
            'token' => $token
        ]);
    }

    public function resetPasswordAction()
    {
        $token = $_POST['token'];

        $user = $this->getUserOrExit($token);

        if ($user->resetPassword($_POST['password'])) {
            View::renderTemplate('Password/reset_success.twig');
        } else {
            View::renderTemplate('Password/reset.twig', [
                'token' => $token,
                'user' => $user
            ]);
        }
    }

    public function getUserOrExit($token)
    {
        $user = User::findByPasswordReset($token);

        if ($user) {
            return $user;
        } else {
            View::renderTemplate('Password/token_expired.twig');
            exit;
        }
    }
}