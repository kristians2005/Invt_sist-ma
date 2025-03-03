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

        $email = $_POST['email'];
        $password = $_POST['password'];

       if (Auth::login($email, $password)) {
            header('Location: /');
            return;
        }
        session_start();
        $_SESSION['user'] = $email;
        header('Location: /');
    }

    public function registerUser()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];

        if ($password !== $password_confirmation) {
            $error = "Password does not match";
            require "views/auth/Register.view.php";
            return;
        }

        if (Auth::emailExists($email)) {
            $error = "This email is already registered. Please use a different email.";
            require "views/auth/Register.view.php";
            return;
        }

        Auth::register($name, $email, $password);
        header('Location: /login');
    }




}