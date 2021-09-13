<?php
require_once 'assets/php/header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-primary">
            <div class="card-header border-primary">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="home" aria-selected="true">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#editProfile" type="button" role="tab" aria-controls="profile" aria-selected="false">Edit Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#changePass" type="button" role="tab" aria-controls="contact" aria-selected="false">Change Password</button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
<!--                    Profile tab content Start -->
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
                    <!--  Profile tab content End -->
                    <!--  Edit Profile tab content Start -->
                    <div class="tab-pane container fade" id="editProfile">
                        <div class="row">
                            <div class="col-sm-6 border-primary">
                                <?php if (!$cphoto) : ?>
                                    <img src="assets/img/avatar.jpeg" class="img-thumbnail" width="350px">
                                <?php else:?>
                                    <img src="<?php echo 'assets/php/'.$cphoto; ?>" class="img-thumbail" width="350px">
                                <?php endif;?>
                            </div>
                            <div class="col-sm-6 border-primary">
                                <form action="" method="post" enctype="multipart/form-data" id="profile-update-form">
                                    <input type="hidden" name="oldImage" value="<?php echo $cphoto?>">
                                    <div class="form-group mt-0">
                                        <label for="profilePhoto" class="form-label">Upload Profile Image</label>
                                        <input type="file" name="image" id="profilePhoto">
                                    </div>

                                    <div class="form-group mt-0">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $cname?>">
                                    </div>

                                    <div class="form-group mt-0">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select name="gender" id="gender" class="form-select">
                                            <option value="" disabled <?php if ($cgender == null) echo 'selected'?>>Select</option>
                                            <option value="Male" <?php if ($cgender == 'Male') echo 'selected'?>>Male</option>
                                            <option value="Female" <?php if ($cgender == 'Female') echo 'selected'?>>Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group mt-0">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input class="form-control" type="date" name="dob" id="dob" value="<?php echo $cdob?>">
                                    </div>

                                    <div class="form-group mt-0">
                                        <label for="phone" class="form-label">Phone number</label>
                                        <input class="form-control" type="tel" name="phone" id="phone" value="<?php echo $cphone ?>" placeholder="Phone">
                                    </div>

                                    <div class="form-group mt-2">
                                        <input type="submit" name="profile_update" value="Update Profile" class="btn btn-danger btn-block" id="profileUpdateBtn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--  Change Password tab content Start -->
                    <div class="tab-pane container fade" id="changePass">
                        <div id="changePassAlert"></div>
                        <div class="row">
                            <div class="col-sm-6 border-primary">
                                <div class="card border-primary">
                                    <div class="card-header text-center bg-primary text-light">
                                        Change Password
                                    </div>
                                    <form action="#" method="post" class="px-3 mt-2" id="change-pass-form">
                                        <div class="form-group">
                                            <label for="curpass">Enter your current password</label>
                                            <input type="password" name="curpass" placeholder="Current Password" class="form-control" id="curpass" required minlength="5">
                                        </div>
                                        <div class="form-group">
                                            <label for="newpass">Enter new password</label>
                                            <input type="password" name="newpass" placeholder="New Password" class="form-control" id="newpass" required minlength="5">
                                        </div>
                                        <div class="form-group">
                                            <label for="cnewpass">Enter new password</label>
                                            <input type="password" name="cnewpass" placeholder="Confirm New Password" class="form-control" id="cnewpass" required minlength="5">
                                        </div>
                                        <div class="form-group">
                                            <p id="changePassError" class="text-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="changepass" value="Change Password" class="btn btn-success btn-block" id="changePassBtn">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-6 border-primary">
                                <img src="assets/img/changepass.jpeg" class="img-thumbail" width="350px">
                            </div>
                        </div>
                    </div>
                    <!--  Change Password tab content End -->

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#profile-update-form').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: 'assets/php/process.php',
                method: 'POST',
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(response){
                    location.reload();
                }

            });
        });

        //Change password ajax request
        $('#changePassBtn').click(function(e){
            if($('#change-pass-form')[0].checkValidity()){
                e.preventDefault();
                $('#changePassBtn').val('Please wait...');

                if($('#newpass').val() != $('#cnewpass').val()){
                    $('#changePassError').text('* Password did not match!');
                    $('#changePassBtn').val('Change Password');
                } else {
                    $.ajax({
                        url: 'assets/php/process.php',
                        method: 'POST',
                        data: $('#change-pass-form').serialize()+'&action=change_pass',
                        success:function(response){
                            $('#changePassAlert').html(response);
                            $('#changePassBtn').val('Change Password');
                            $('#changePassError').text('');
                            $('#change-pass-form')[0].reset();
                        }
                    });
                }
            }
        });
    });
</script>
</body>
</html>