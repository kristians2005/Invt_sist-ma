<?php

require_once "models/Model.php";

class Users extends Model
{
    protected static function getTableName(): string
    {
        return "users";
    }

    public static function update(int $id, array $data): bool
    {
        $table = static::getTableName();
        $updates = implode(", ", array_map(fn($key) => "$key = :$key", array_keys($data)));

        $sql = "UPDATE $table SET $updates WHERE id = :id";
        $data['id'] = $id;

        $stmt = self::getDB()->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }
}