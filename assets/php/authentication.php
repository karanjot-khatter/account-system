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

    //login existing user
    public function login ($email){
        $sql = 'Select email, password from users where email = :email and deleted != 0';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;

    }

    //current user in session

    public function currentUser($email){
        $sql = 'select * from users where email = :email and deleted != 0';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    //forgot password

    public function forgotPassword($token, $email){
        $sql = 'update users set token = :token, token_expire = DATE_ADD(NOW(), INTERVAL 10 MINUTE ) where email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['token' => $token , 'email' => $email]);

        return true;
    }

    //reset password user authentication
    public function reset_pass_auth($email, $token){
        $sql = "Select id from users where email = :email and token = :token and token != '' and token_expire > now() and deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email, 'token' => $token ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    //update new password to database

    public function updateNewPass($pwd, $email) {
        $sql = "Update users set token='', password = :pwd where email = :email and deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['pwd' => $pwd, 'email' => $email ]);

        return true;
    }

    //insert new note to notes table
    public function addNewNote($uid, $title, $note){
        $sql = 'INSERT INTO notes (uid, title, note) VALUES (:uid, :title, :note)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid' => $uid, 'title' => $title, 'note' => $note]);
        return true;
    }

    //fetch all notes from user
    public function getNotes($uid){
        $sql = 'Select * from notes where uid = :uid';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid' => $uid ]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}