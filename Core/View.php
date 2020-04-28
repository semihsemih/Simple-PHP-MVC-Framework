<?php


namespace Core;

use App\Auth;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view";

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }

    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new FilesystemLoader('../App/Views');
            $twig = new Environment($loader);
            $twig->addGlobal('is_logged_in', Auth::isLoggedIn());
        }

        echo $twig->render($template, $args);
    }
}