<?php

require "models/Model.php";

class Orders extends Model
{
    protected static function getTableName(): string
    {
        return "orders";
    }
}
