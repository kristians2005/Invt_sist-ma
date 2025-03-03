<?php

require_once "Users.php";

class UsersController
{
    private $usersModel;

    public function __construct()
    {
        $this->usersModel = new Users();
        session_start();
    }

    private function checkRole($requiredRole)
    {
        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) return false;
        return $this->usersModel->getRole($userId) === $requiredRole;
    }

    private function isAdmin() { return $this->checkRole('Admin'); }
    private function isWorker() { return $this->checkRole('Worker'); }

    public function index()
    {
        if ($this->isAdmin() || $this->isWorker()) {
            $users = $this->usersModel->getAll();
            require "views/auth/index.view.php";
        } else {
            header('HTTP/1.1 403 Forbidden');
            echo "Access denied.";
            exit;
        }
    }

    public function show()
    {
        if ($this->isAdmin() || $this->isWorker()) {
            $user = $this->usersModel->find($_GET['id']);
            if ($user) {
                require "views/auth/show.view.php";
            } else {
                header('HTTP/1.1 404 Not Found');
                echo "User not found.";
                exit;
            }
        } else {
            header('HTTP/1.1 403 Forbidden');
            echo "Access denied.";
            exit;
        }
    }

    public function create()
    {
        if ($this->isAdmin()) {
            require "views/auth/create.view.php";
        } else {
            header('HTTP/1.1 403 Forbidden');
            echo "Access denied.";
            exit;
        }
    }

    public function store()
    {
        if ($this->isAdmin()) {
            try {
                $data = [
                    'username' => $_POST['username'],
                    'epasts' => $_POST['epasts'],
                    'roles' => $_POST['roles'],
                    'parole' => $_POST['parole']
                ];
                $this->usersModel->create($data);
                header("Location: /users/index");
                exit;
            } catch (Exception $e) {
                header('HTTP/1.1 500 Internal Server Error');
                echo "Error creating user: " . $e->getMessage();
                exit;
            }
        } else {
            header('HTTP/1.1 403 Forbidden');
            echo "Access denied.";
            exit;
        }
    }

    public function update()
    {
        if ($this->isAdmin()) {
            try {
                $data = [
                    'username' => $_POST['username'],
                    'epasts' => $_POST['epasts'],
                    'roles' => $_POST['roles']
                ];
                $this->usersModel->update($_POST['id'], $data);
                header("Location: /users/index");
                exit;
            } catch (Exception $e) {
                header('HTTP/1.1 500 Internal Server Error');
                echo "Error updating user: " . $e->getMessage();
                exit;
            }
        } else {
            header('HTTP/1.1 403 Forbidden');
            echo "Access denied.";
            exit;
        }
    }

    public function destroy()
    {
        if ($this->isAdmin()) {
            try {
                $this->usersModel->delete($_POST['id']);
                header("Location: /users/index");
                exit;
            } catch (Exception $e) {
                header('HTTP/1.1 500 Internal Server Error');
                echo "Error deleting user: " . $e->getMessage();
                exit;
            }
        } else {
            header('HTTP/1.1 403 Forbidden');
            echo "Access denied.";
            exit;
        }
    }
}