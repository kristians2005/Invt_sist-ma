<?php

require "models/Auth.php";

class AuthController
{


    public function login()
    {
       
        require "views/auth/Login.view.php";
    }

    public function register()
    {
    
      
        require "views/auth/Register.view.php";
    
    }

    public function logout()
    {


    }

    public function authenticate()
    {
var_dump($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];

       if (Auth::login($email, $password)) {
            header('Location: /');
            return;
        }

        header('Location: /');
    }

    public function registerUser()
    {
var_dump($_POST);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];

        if ($password !== $password_confirmation) {
            echo "Password does not match";
            return;
        }

Auth::register($name, $email, $password);

        header('Location: /login');
    }




}