<?php

namespace app\core;
class Database
{
    private $host = "localhost";
    private $dbname = "loyalty_club";
    private $user = "root";
    private $password = "";


    public $conn;
    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";
        $pdo = new \PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $this->conn = $pdo;
    }
    public function beginTransaction()
    {
        return $this->conn->beginTransaction();
    }
    public function commit()
    {
        return $this->conn->commit();
    }
    public function rollBack()
    {
        return $this->conn->rollBack();
    }
}

