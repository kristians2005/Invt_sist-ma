<?php

require('config.php');


class DataBase
{

    private $config;

    public $dbConn;
    public $pdo;

    function __construct()
    {
        $this->pdo = "mysql:" . http_build_query($this->config, "", ";");
    }

    public function connection()
    {
        $this->dbConn = new PDO($this->pdo);
        $this->dbConn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $this->dbConn;
    }



    function __destruct()
    {
        $this->dbConn = null;
    }



}