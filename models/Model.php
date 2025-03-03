<?php
require "Database.php";

abstract class Model
{
    protected static $db;

    public static function init()
    {
        if (!self::$db) {
            self::$db = new Database();
        }
    }
    abstract protected static function getTableName(): string;

    public static function all()
    {
        self::init();
        $sql = "SELECT * FROM " . static::getTableName();

        $records = self::$db->query($sql)->fetchAll();
        return $records;
    }

    public static function register ($name, $email, $password)
    {
        self::init();
       
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO " . static::getTableName() . " (name, email, password) VALUES (:name, :email, :password)";
    
        $records = self::$db->query($sql, [":name" => $name, ":email" => $email, ":password" => $hashedPassword]);
        return $records;

    }

    public static function login ($email, $password)
    {
        self::init();
        $sql = "SELECT * FROM " . static::getTableName() . " WHERE email = :email";
        $records = self::$db->query($sql, [":email" => $email])->fetch();
        if (!$records) {
            return false;
        }
        if (password_verify($password, $records['password'])) {
            return true;
        }
        return false;
    }


    public static function emailExists($email)
    {
        self::init();
        $sql = "SELECT COUNT(*) FROM " . static::getTableName() . " WHERE email = :email";
        $count = self::$db->query($sql, [":email" => $email])->fetchColumn();
        return $count > 0;
    }


}