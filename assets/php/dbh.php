<?php

class Dbh {

    private $host = '127.0.0.1';
    private $user = "root";
    private $pwd = "root";
    private $dbName = "user_system";

    public $conn;

    public function __construct() {
        try {

            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $this->conn =  new PDO($dsn, $this->user, $this->pwd);

        } catch (PDOException $e) {
            echo 'Error ' . $e->getMessage();
        }

        return $this->conn;
    }
}
