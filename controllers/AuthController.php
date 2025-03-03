<?php

require "models/Auth.php";

class AuthController
{


    public function login()
    {
<<<<<<< HEAD
       
=======

>>>>>>> 9d42798 (inventory_start)
        require "views/auth/Login.view.php";
    }

    public function register()
    {
<<<<<<< HEAD
    
      
        require "views/auth/Register.view.php";
    
=======


        require "views/auth/Register.view.php";

>>>>>>> 9d42798 (inventory_start)
    }

    public function logout()
    {


    }

    public function authenticate()
    {
<<<<<<< HEAD
var_dump($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];

       if (Auth::login($email, $password)) {
=======
        var_dump($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (Auth::login($email, $password)) {
>>>>>>> 9d42798 (inventory_start)
            header('Location: /');
            return;
        }
        session_start();
        $_SESSION['user'] = $email;
        header('Location: /');
    }

    public function registerUser()
    {
<<<<<<< HEAD
var_dump($_POST);
=======
        var_dump($_POST);
>>>>>>> 9d42798 (inventory_start)
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];

        if ($password !== $password_confirmation) {
            echo "Password does not match";
            return;
        }

<<<<<<< HEAD
Auth::register($name, $email, $password);
=======
        Auth::register($name, $email, $password);
>>>>>>> 9d42798 (inventory_start)

        header('Location: /login');
    }




}