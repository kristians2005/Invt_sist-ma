<?php


class dbController
{

    public $dbConnection;

    function __construct($dbConnections)
    {
        $this->dbConnection = $dbConnections;
    }

    public function showAll()
    {
        // $result = $this->dbConnection->dbConn->query(' SELECT * FROM stuff2 ');
        // $result->execute();
        // $result = $result->fetchAll(PDO::FETCH_ASSOC);
        // return $result;
    }


}