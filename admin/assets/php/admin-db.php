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
}
?>