<?php


namespace App\Controllers\Admin;

use Core\Controller;

class Users extends Controller
{
    protected function before()
    {
        // TODO: Make sure and admin user is logged in
    }

    public function indexAction()
    {
        echo "User admin index";
    }


}