<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

require_once 'authentication.php';
$user = new Auth();

//handle register ajax request
if (isset($_POST['action']) && $_POST['action'] == 'register')
{
    $name = $user->test_input($_POST['name']);
    $email = $user->test_input($_POST['email']);
    $pwd = $user->test_input($_POST['password']);

    $hpass = password_hash($pwd, PASSWORD_DEFAULT);

    if ($user->user_exist($email)){
        echo $user->showMessage('warning', 'This email is already registered');
    }
    else{
        if ($user->register($name, $email, $hpass)){
            echo 'register';
            $_SESSION['user'] = $email;
        } else{
            echo $user->showMessage('warning', 'Something went wrong! try again later!');
        }
    }
}
//handle login ajax request
if (isset($_POST['action']) && $_POST['action'] == 'login'){
    $email = $user->test_input($_POST['email']);
    $pwd = $user->test_input($_POST['password']);

    $loggedInUser = $user->login($email);

    if($loggedInUser != null) {
        if (password_verify($pwd, $loggedInUser['password'])){
            if (!empty($_POST['rem'])){
                setcookie('email' , $email, time() + (30*24*60*60), '/');
                setcookie('password' , $pwd, time() + (30*24*60*60), '/');
            } else{
                setcookie('email' , '' , '1', '/');
                setcookie('password' , '' , '1', '/');
            }

            echo 'login';
            $_SESSION['user'] = $email;
        } else {
            echo $user->showMessage('danger', 'Password is incorrect!');
        }
    } else {
        echo $user->showMessage('danger', 'User not found');
    }
}

//handle forgot ajax request
if (isset($_POST['action']) && $_POST['action'] == 'forgot') {
    $email = $user->test_input($_POST['email']);
    $user_found = $user->currentUser($email);

    if ($user_found != null){
        $token = uniqid();
        $token = str_shuffle($token);
        $user->forgotPassword($token, $email);

//        try{
//            $mail->isSMTP();
//            $mail->Host = "smtp.live.com";
//            $mail->SMTPAuth = true;
//            $mail->Username;
//            $mail->Password;
//            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//            $mail->Port = 587;
//
//            $mail->setFrom();
//            $mail->addAddress($email);
//            $mail->isHTML(true);
//            $mail->Subject = 'Reset Password';
//            $mail->Body = '<h3>Click the below link to reset your password. <br> <a href="http://account-system/reset-pass.php?email='.$email.'&token='.$token.'">http://account-system/reset-pass.php?email='.$email.'&token='.$token.'</a><br>Regards <br> Karanjot!</h3>';
//            $mail->send();
//
//            echo $user->showMessage('success', 'we have sent you the reset link, please check your email!');
//
//        } catch (Exception $e) {
//            echo $user->showMessage('danger', 'Something went wrong, please try again later');
//        }
    } else {
        echo $user->showMessage('info', 'This email is not registered');
    }


}

