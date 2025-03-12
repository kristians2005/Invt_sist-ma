<?php

require_once "models/Users.php";

class UsersController
{

    public function index()
    {
        $users = Users::all();
        require "views/users/index.view.php";
    }

    public function show()
    {
      
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $roles = $_POST['roles'];

            Users::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'roles' => $roles
            ]);

            header("Location: /users");
        }
        require "views/users/Create.view.php";
    }

    public function store()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];
        $roles = $_POST['roles'];

        $error = [];

        if (Validator::required($name)) {
            $error["name"] = "Name is required.";
        }

        if (!Validator::strLengt($name, 3, 50)) {
            $error["name"] = "Name must be between 3 and 50 characters long.";
        }

        if (!Validator::passwordMatch($password, $password_confirmation)) {
            $error["password"] = "Passwords do not match.";
        }

        if (!Validator::passwordContains($password)) {
            $error["password"] = "Password must contain at least one number and one uppercase letter and one simbol.";
        }

        if (!Validator::passwordLength($password)) {
            $error["password"] = "Password must be at least 8 characters long.";
        }

        if (!Validator::email($email)) {
            $error["email"] = "Email is not valid.";
        }

        if (Auth::emailExists($email)) {
            $error["email"] = "This email is already registered. Please use a different email.";
        }



        var_dump($error);

        if (empty($error)) {
            Auth::register($name, $email, $password);
            header('Location: /users');
        } else {
            require "views/users/Create.view.php";
        }
    }

    public function edit()
    {

        $id = $_GET['id'];
        $user = Users::find($id);
        require "views/users/Edit.view.php";
    }

    public function update()
    {
        $id = $_GET['id'];
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'roles' => $_POST['roles']
        ];

        Users::updateUser($id, $data);
        header("Location: /users");

    }

    public function destroy()
    {
        $id = $_GET['id'];
        Users::destroy($id);
        header("Location: /users");
    }
}