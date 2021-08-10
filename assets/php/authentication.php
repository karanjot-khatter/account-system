<?php

require_once 'dbh.php';

class Auth extends Dbh {

    //Register new user
    public function register($name, $email, $pwd)
    {
        $sql = 'insert into users(name, email, password) VALUES(:name, :email, :pass)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name' => $name, 'email' => $email, 'pass' => $pwd]);

        return true;
    }

    //Check if user is registered or not
    public function user_exist($email)
    {
        $sql = 'Select email from users where email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}