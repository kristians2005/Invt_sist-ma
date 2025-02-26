<?php

require "models/Auth.php";

class AuthController
{


    public function login()
    {

        require "views/auth/login.view.php";
    }

    public function register()
    {

        require "views/auth/register.view.php";
    }

    public function logout()
    {


    }

    public function authenticate()
    {


    }

    public function registerUser()
    {


    }




}