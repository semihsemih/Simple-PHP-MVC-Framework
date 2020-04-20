<?php


namespace App\Controllers\Admin;


class Users extends \Core\Controller
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