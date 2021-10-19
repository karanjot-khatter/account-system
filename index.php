<?php
session_start();
if(isset($_SESSION['user'])){
    header('location:home.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

</head>
<body>
<div class="container">
<!--    Login form start-->

    <div class="row justify-content-center" id="login-box">
        <div class="col-md-10">
            <div class="card-group">
                <div style="flex-grow: 1.5" class="card">
                    <h1 class="text-center sign-in text-primary">Sign in to Account</h1>
                    <form action="#" method="POST" id="login-form">
                        <div id="login-alert"></div>
                        <div class="input">
                            <span class="icon-background">
                                <i class="far fa-envelope fa-lg"></i>
                            </span>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];}?>">
                        </div>

                        <div class="input">
                            <span class="icon-background">
                               <i class="fas fa-key fa-lg"></i>
                            </span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];}?>">
                        </div>

                        <div class="login-extras">
                            <div class="remember-me">
                                <input type="checkbox" name="rem" id="customCheck" <?php if (isset($_COOKIE['email'])) {?> checked <?php }?>>
                                <label for="customCheck">Remember me</label>
                            </div>
                            <div class="forgot-password">
                                <a href="#" id="forgot-link">Forgot Password?</a>
                            </div>
                        </div>

                        <input type="submit" Value="Sign in" id="login-btn" class="btn btn-primary login-btn">

                    </form>
                </div>

                <div style="background-color: #ff8c00;" class="card">
                    <h1 class="text-center sign-up-title">Hello friends!</h1>
                    <h4 class="sign-up-body">Enter your personal details and start your journey with us!</h4>
                    <button id="register-link" class="btn register-btn">Sign up</button>

                </div>

            </div>
        </div>
    </div>

<!--    Login form end-->

<!--    Register Form start-->

    <div class="row justify-content-center" id="register-box" style="display:none;">
        <div class="col-md-10">
            <div class="card-group">
                <div style="background-color: #ff8c00;" class="card">
                    <h1 style="margin-top: 40px;" class="text-center sign-up-title">Welcome back!</h1>
                    <h4 class="sign-up-body">To keep connected with us please login with your personal info.</h4>
                    <button id="login-link" class="btn register-btn">Sign In</button>
                </div>
                <div class="card" style="flex-grow: 1.5" >
                    <h1 class="text-center sign-in text-primary">Create account</h1>
                    <form action="#" method="POST" id="register-form">
                        <div id="regAlert"></div>
                        <div class="input">
                            <span class="icon-background">
                                <i class="far fa-user fa-lg"></i>
                            </span>
                            <input type="text" name="name" id="rname" class="form-control" placeholder="Full Name" required>
                        </div>

                        <div class="input">
                            <span class="icon-background">
                                <i class="far fa-envelope fa-lg"></i>
                            </span>
                            <input type="email" name="email" id="remail" class="form-control" placeholder="Email" required>
                        </div>

                        <div class="input">
                            <span class="icon-background">
                               <i class="fas fa-key fa-lg"></i>
                            </span>
                            <input type="password" name="password" id="rpassword" class="form-control" placeholder="Password" required minlength="5">
                        </div>

                        <div class="input">
                            <span class="icon-background">
                               <i class="fas fa-key fa-lg"></i>
                            </span>
                            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" required minlength="5">
                        </div>

                        <div style="font-weight:bold;" class="text-danger" id="passError"></div>

                        <input type="submit" Value="Sign Up" id="register-btn" class="btn btn-primary login-btn">

                    </form>
                </div>

            </div>
        </div>
    </div>
<!--    Register Form end-->

<!--Forgot password form start-->
    <div class="row justify-content-center" id="forgot-box" style="display:none;">
        <div class="col-md-10">
            <div class="card-group">

                <div style="background-color: #ff8c00;" class="card">
                    <h1 style="margin-top: 40px;" class="text-center sign-up-title">Reset Password!</h1>
                    <button id="back-link" class="btn register-btn">Back</button>

                </div>


                <div style="flex-grow: 1.5" class="card">
                    <h1 class="text-center sign-in text-primary">Forgot your password</h1>
                    <p style="padding:10px;" class="text-center">To reset your password, enter the registered email address and we will send you the rest of the instructions on your email!</p>
                    <form action="#" method="POST" id="forgot-form">
                        <div id="forgotAlert"></div>
                        <div class="input">
                            <span class="icon-background">
                                <i class="far fa-envelope fa-lg"></i>
                            </span>
                            <input type="email" name="email" id="femail" class="form-control" placeholder="Email" required>
                        </div>

                        <input type="submit" Value="Reset Password" id="forgot-btn" class="btn btn-primary login-btn">

                    </form>
                </div>

            </div>
        </div>
    </div>
<!--    Forgot password form end-->
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       $('#register-link').click(function (){
           $('#login-box').hide();
           $('#register-box').show();
       });

        $('#login-link').click(function (){
            $('#login-box').show();
            $('#register-box').hide();
        });

        $('#forgot-link').click(function (){
            $('#login-box').hide();
            $('#forgot-box').show();
        });

        $('#back-link').click(function (){
            $('#login-box').show();
            $('#forgot-box').hide();
        });

        //register ajax request
        $('#register-btn').click(function(e){
            if($('#register-form')[0].checkValidity()){
                //stop going to new page
                e.preventDefault();
                $('#register-btn').val('Please wait...');

                if($('#rpassword').val() != $('#cpassword').val()){
                    $('#passError').text('* Password did not match!');
                    $('#register-btn').val('Sign up');
                } else {
                    $('#passError').text('');
                    $.ajax({
                        url : 'assets/php/action.php',
                        method: "POST",
                        data : $('#register-form').serialize()+'&action=register',
                        success: function(response) {
                            $('#register-btn').val('Sign up');
                            if (response === 'register')
                            {
                                window.location = 'home.php';
                            } else {
                                $('#regAlert').html(response);
                            }
                        }
                    });

                }
            }
        });

        //login ajax request
        $('#login-btn').click(function(e){
            if($('#login-form')[0].checkValidity()){
                e.preventDefault();
                $('#login-btn').val('Please wait...');

                $.ajax({
                    url : 'assets/php/action.php',
                    method: "POST",
                    data : $('#login-form').serialize()+'&action=login',
                    success: function(response){
                        $('#login-btn').val('Sign in');
                        if (response === 'login')
                        {
                            window.location = 'home.php';
                        } else{
                            $('#login-alert').html(response);
                        }
                    }
                });

            }
        });

        //Forgot password ajax request
        $('#forgot-btn').click(function(e){
            if($('#forgot-form')[0].checkValidity()){
                e.preventDefault();

                $('#forgot-btn').val('Please wait...');

                $.ajax({
                    url : 'assets/php/action.php',
                    method: "POST",
                    data : $('#forgot-form').serialize()+'&action=forgot',
                    success: function (response){
                        $('#forgot-btn').val('Reset Password');
                        $('#forgot-form')[0].reset();
                        $('#forgotAlert').html(response);

                    }
                });
            }
        });
    });
</script>
</body>
</html>