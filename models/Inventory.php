<?php

require "models/Model.php";

class Inventory extends Model
{
    protected static function getTableName(): string
    {
        return "inventory";
    }
}
