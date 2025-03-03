<?php

require_once "models/Model.php";

class Orders extends Model
{
    protected static function getTableName(): string
    {
        return "orders";
    }
}
