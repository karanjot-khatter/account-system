<?php
require_once 'assets/php/header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-primary">
            <div class="card-header border-primary">
                <ul class="nav">
                    <li class="nav-item">
                        <a style="font-weight:bold;" class="nav-link active" aria-current="page" href="#profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a style="font-weight:bold;" class="nav-link" aria-current="page" href="#editProfile">Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a style="font-weight:bold;" class="nav-link" aria-current="page" href="#changePass">Change Password</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active card" id="profile">
                        <div class="row">
                            <div class="col-sm-6 border-primary">
                                <div class="card border-primary">
                                    <div class="card-header text-center bg-primary text-light">
                                        User ID : <?php echo $cid ?>
                                    </div>
                                    <div class="card-body">
                                        <p style="border:1px solid blue" class="card-text"><strong>Name : </strong><?php echo $cname;?></p>
                                        <p style="border:1px solid blue" class="card-text"><strong>Email : </strong><?php echo $cEmail;?></p>
                                        <p style="border:1px solid blue" class="card-text"><strong>Gender : </strong><?php echo $cgender;?></p>
                                        <p style="border:1px solid blue" class="card-text"><strong>Date Of Birth : </strong><?php echo $cdob;?></p>
                                        <p style="border:1px solid blue" class="card-text"><strong>Phone : </strong><?php echo $cphone;?></p>
                                        <p style="border:1px solid blue" class="card-text"><strong>Registered On : </strong><?php echo $reg_on;?></p>
                                        <p style="border:1px solid blue" class="card-text"><strong>Email verified : </strong><?php echo $verified ? 'Verified' : 'Not verified'?>
                                        <?php if (!$verified):?>
                                            <a style="float:right" href="#" id="verify-email">Verify now</a>
                                        <?php endif;?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 border-primary">
                                <div class="card border-primary">
                                    <?php if (!$cphoto) : ?>
                                        <img src="assets/img/avatar.jpeg" class="img-thumbnail" width="350px">
                                    <?php else:?>
                                        <img src="<?php echo 'assets/php/'.$cphoto; ?>" class="img-thumbail" width="350px">
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>