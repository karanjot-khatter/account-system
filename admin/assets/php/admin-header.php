<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('location:index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $title = basename($_SERVER['PHP_SELF'], '.php');
        $title = explode('-', $title);
        $title = ucfirst($title[1]);
    ?>
    <title><?php echo $title?> | Admin Panel </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <style type="text/css">
        .admin-nav{
            width: 220px;
            min-height: 100vh;
            overflow: hidden;
            background-color:#343a40;
            transition: 0.3s all ease-in-out;
        }
        .admin-link{
            background-color:#343a40;
        }
        .admin-link:hover, .nav-active{
            background-color: #212529;
            text-decoration:none;
        }
        .animate{
            width:0;
            transition: 0.3s all ease-in-out;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="admin-nav p-0 col-lg-2">
            <h4 class="text-light text-center p-2">Admin Panel</h4>
            <ul class="list-group">
                <li><a href="admin-dashboard.php" class="list-group-item text-light admin-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin-dashboard.php' ? 'nav-active' : '' ?>"><i class="fas fa-chart-pie"></i>  Dashboard</a></li>

                <li><a href="admin-users.php" class="list-group-item text-light admin-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin-users.php' ? 'nav-active' : '' ?>"><i class="fas fa-user-friends"></i>  Users</a></li>

                <li><a href="admin-notes.php" class="list-group-item text-light admin-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin-notes.php' ? 'nav-active' : '' ?>"><i class="fas fa-sticky-note"></i>  Notes</a></li>

                <li><a href="admin-feedback.php" class="list-group-item text-light admin-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin-feedback.php' ? 'nav-active' : '' ?>"><i class="fas fa-comment"></i>  Feedback</a></li>

                <li><a href="admin-notification.php" class="list-group-item text-light admin-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin-notification.php' ? 'nav-active' : '' ?>"><i class="fas fa-bell"></i>  Notification</a></li>

                <li><a href="admin-deleteduser.php" class="list-group-item text-light admin-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin-deletedusers.php' ? 'nav-active' : '' ?>"><i class="fas fa-user-slash"></i>  Deleted Users</a></li>

                <li><a href="" class="list-group-item text-light admin-link"><i class="fas fa-table"></i>  Export Users</a></li>

                <li><a href="#" class="list-group-item text-light admin-link"><i class="fas fa-id-card"></i>  Profile</a></li>

                <li><a href="#" class="list-group-item text-light admin-link"><i class="fas fa-cog"></i>  Settings</a></li>
            </ul>
        </div>
        <div class="col-lg-10 p-0">
            <div class="bg-primary pt-2 justify-content-between d-flex">
                <a href="#" class="text-white" id="open-nav"><h3><i class="fas fa-bars"></i></h3></a>
                <h4 class="text-light"><?php echo $title;?></h4>
                <a href="assets/php/logout.php" class="text-light mt-1"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#open-nav').click(function(){
        $('.admin-nav').toggleClass('animate');
    });
});
</script>