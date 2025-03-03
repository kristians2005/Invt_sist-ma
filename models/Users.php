<?php

require_once "Database.php"; 

class Users
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); 
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT id, username, epasts, roles FROM users");
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->query("SELECT id, username, epasts, roles FROM users WHERE id = :id", [':id' => $id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        return $this->db->query(
            "INSERT INTO users (username, epasts, roles, parole) VALUES (:username, :epasts, :roles, :parole)",
            [
                ':username' => $data['username'],
                ':epasts' => $data['epasts'],
                ':roles' => $data['roles'],
                ':parole' => password_hash($data['parole'], PASSWORD_DEFAULT)
            ]
        );
    }

    public function update($id, $data)
    {
        return $this->db->query(
            "UPDATE users SET username = :username, epasts = :epasts, roles = :roles WHERE id = :id",
            [
                ':username' => $data['username'],
                ':epasts' => $data['epasts'],
                ':roles' => $data['roles'],
                ':id' => $id
            ]
        );
    }

    public function delete($id)
    {
        return $this->db->query("DELETE FROM users WHERE id = :id", [':id' => $id]);
    }

    public function getRole($id)
    {
        $stmt = $this->db->query("SELECT roles FROM users WHERE id = :id", [':id' => $id]);
        $result = $stmt->fetch();
        return $result ? $result['roles'] : null;
    }

    public function verifyLogin($epasts, $parole)
    {
        $stmt = $this->db->query("SELECT id, parole FROM users WHERE epasts = :epasts", [':epasts' => $epasts]);
        $user = $stmt->fetch();
        if ($user && password_verify($parole, $user['parole'])) {
            return $user['id'];
        }
        return false;
    }
}