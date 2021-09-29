<?php
    session_start();

    if(isset($_SESSION['username'])){
        header('location:admin-dashboard.php');
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
    <title>Login | admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

</head>
<body class="bg-dark">
    <div class="row align-items-center justify-content-center">
        <div class="col-lg-5">
            <div class="card border-danger">
                <div class="card-header bg-danger">
                    <h3 class="m-0 text-white"><i class="fas fa-user-cog"></i> Admin Panel Login</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST" class="px-3" id="admin-login-form">
                        <div id="adminLoginAlert"></div>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                        </div>
                        <div class="form-group mt-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>

                        <div class="form-group mt-3">
                            <input type="submit" name="admin-login" class="btn btn-danger btn-block" value="Login" id="adminLoginBtn">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $('#adminLoginBtn').click(function(e){
            if($('#admin-login-form')[0].checkValidity()){
                e.preventDefault();

                $(this).val('Please wait...');
                $.ajax({
                    url: 'assets/php/admin-action.php',
                    method: 'POST',
                    data: $('#admin-login-form').serialize()+'&action=adminLogin',
                    success: function(response){
                        if(response === 'admin_login'){
                            window.location = 'admin-dashboard.php';
                            console.log('hello');
                        } else {
                            console.log(response);
                            $('#adminLoginAlert').html(response);
                        }

                        $('#adminLoginBtn').val('Login');
                    }
                });
            }
        });
    });
</script>
</body>
</html>