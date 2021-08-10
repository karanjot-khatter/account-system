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

    //check input
    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //error success message alert
    public function showMessage($type, $message)
    {
        return '<div class="alert alert-'.$type .' alert-dismissible">
                <button type="button" class="close"
                data-dismiss="alert">&times;</button>
                <strong class="text-center">'.$message.'</strong>
                </div>';
    }


}
