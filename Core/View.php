<?php


namespace Core;

use App\Auth;
use App\Flash;
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
        echo static::getTemplate($template, $args);
    }

    public static function getTemplate($template, $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new FilesystemLoader('../App/Views');
            $twig = new Environment($loader);
            $twig->addGlobal('current_user', Auth::getUser());
            $twig->addGlobal('flash_messages', Flash::getMessages());
        }

        return $twig->render($template, $args);
    }
}