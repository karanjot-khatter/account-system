<?php

//example http://account-system/reset-pass.php?email=karanjot_khatter@hotmail.co.uk&token=5274fc6394114
require_once 'assets/php/authentication.php';
$user = new Auth();
$msg = '';

if (isset($_GET['email']) && isset($_GET['token']) )
{
    $email = $user->test_input($_GET['email']);
    $token = $user->test_input($_GET['token']);

    $auth_user =  $user->reset_pass_auth($email, $token);

    if ($auth_user != null)
    {
        if(isset($_POST['submit'])){
            $newPass = $_POST['pass'];
            $cNewPass = $_POST['cpass'];

            $hNewPass = password_hash($newPass, PASSWORD_DEFAULT);

            if ($newPass == $cNewPass)
            {
                $user->updateNewPass($hNewPass, $email);
                $msg = 'Password Changed successfully!<br><a href="index.php">Login Here!</a>';
            } else{
                $msg = 'Password did not match';
            }
        }
    }
    else{
        header('location:index.php');
        exit();
    }
} else {
    header('location:index.php');
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

</head>
<body>
<div class="container">
    <!--    Login form start-->

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-group">
                <div style="background-color: #ff8c00;" class="card">
                    <h1 style="border-bottom: none; padding:100px 20px" class="text-center sign-up-title">Reset your password here!</h1>

                </div>
                <div style="flex-grow: 2" class="card">
                    <h1 class="text-center sign-in text-primary">Enter New Password!</h1>
                    <form action="#" method="POST">
                        <div class="text-center"><?php echo $msg ?></div>
                        <div class="input">
                            <span class="icon-background">
                               <i class="fas fa-key fa-lg"></i>
                            </span>
                            <input type="password" name="pass" class="form-control" placeholder="New Password" required minlength="5">
                        </div>

                        <div class="input">
                            <span class="icon-background">
                               <i class="fas fa-key fa-lg"></i>
                            </span>
                            <input type="password" name="cpass" class="form-control" placeholder="Confirm New Password" required minlength="5">
                        </div>

                        <input type="submit" Value="Reset Password" name="submit" class="btn btn-primary login-btn">

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>