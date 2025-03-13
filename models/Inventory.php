<?php

require "models/Model.php";

class Inventory extends Model
{
    protected static function getTableName(): string
    {
        return "inventory";
    }
    public static function all()
    {
        self::init();
        $sql = "SELECT * FROM " . self::getTableName();

        $records = self::$db->query($sql)->fetchAll();
        return $records ?: [];
    }
    public static function find(int $id): ?array
    {
        self::init();
        $sql = "SELECT * FROM " . self::getTableName() . " WHERE id = :id LIMIT 1";

        $record = self::$db->query($sql, [":id" => $id])->fetch();
        return $record ?: null;
    }
}
