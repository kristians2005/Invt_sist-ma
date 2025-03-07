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

        require "views/auth/create.view.php";
    }

    public function store()
    {
      
    }

    public function edit()
    {

        $id = $_GET['id'];
        var_dump($id);
        $user = Users::find($id);
        require "views/users/Edit.view.php";
    }

    public function update($id)
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'roles' => $_POST['roles']
        ];

        Users::update($id, $data);
        header("Location: /users");

    }

    public function destroy()
    {

    }
}