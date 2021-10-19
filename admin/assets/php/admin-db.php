<?php

require_once 'config.php';

class Admin extends Dbh{

    //admin login
    public function adminLogin($username, $password){
        $sql = 'Select username, password from admin where username =:username and password =:password';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    //Count total number of rows

    public function totalCount($tablename){
        $sql="SELECT * from $tablename";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();

        return $count;

    } 

    //gender percentage

    public function noOfMaleUsers(){
        $sql="SELECT * from users WHERE gender = 'Male'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;

    }

    public function noOfFemaleUsers(){
        $sql="SELECT * from users WHERE gender = 'Female'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;

    }
}
?>