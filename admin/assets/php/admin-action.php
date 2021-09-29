<?php
require_once 'admin-db.php';
$admin = new Admin();
session_start();

//Handle admin login ajax request

if(isset($_POST['action']) && $_POST['action'] == 'adminLogin'){
    $username = $admin->test_input($_POST['username']);
    $password = $admin->test_input($_POST['password']);

    $hpassword = sha1($password);

    $loggedInAdmin = $admin->adminLogin($username, $hpassword);

    if ($loggedInAdmin != null){
        echo 'admin_login';
        $_SESSION['username'] = $username;

    } else{
        echo $admin->showMessage('danger', 'Username or password was incorrect');
    }
}
?>