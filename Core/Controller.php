<?php


namespace Core;

use App\Auth;

abstract class Controller
{
    protected $route_params = [];

    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

    public function __call($name, $arguments)
    {
        $method = $name . 'Action';

        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func([$this, $method], $arguments);
                $this->after();
            }
        } else {
            throw new \Exception("Method $method not found in controller " . get_class($this));
        }
    }

    protected function before()
    {
    }

    protected function after()
    {
    }

    public function redirect($url)
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $url , true, 303);
        exit;
    }

    public function requireLogin()
    {
        if (!Auth::isLoggedIn()) {
            Auth::rememberRequestedPage();
            $this->redirect('/login');
        }
    }
}