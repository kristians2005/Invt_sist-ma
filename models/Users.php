<?php

require "models/Model.php";

class Users extends Model
{
    protected static function getTableName(): string
    {
        return "users";
    }
}
