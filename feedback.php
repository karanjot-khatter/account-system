<?php
require_once 'assets/php/header.php';
?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="row justify-content-center">
    <div class="col-lg-8 mt-3">
        <div class="card border-primary">
            <div class="card-header text-center bg-primary text-white">
                Send feedback to admin!
            </div>
            <div class="card-body">
                <form action="#" method="post" class="px-4" id="feedback-form">
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Write your subject" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <textarea name="feedback" placeholder="Write your Feedback here" class="form-control" cols="30" rows="10" required></textarea>
                    </div>

                    <div class="form-group mt-2">
                        <input type="submit" name="feedbackBtn" id="feedbackBtn" value="Send button" class="btn btn-primary ">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //send feedback to admin ajax Request
        $('#feedbackBtn').click(function(e){
            if($('#feedback-form')[0].checkValidity()){
                e.preventDefault();
                $(this).val('Please wait...');
                $.ajax({
                    url: 'assets/php/process.php',
                    method: 'POST',
                    data: $('#feedback-form').serialize()+'&action=feedback',
                    success:function(response){
                        $('#feedback-form')[0].reset();
                        $('#feedbackBtn').val('Send feedback');

                        Swal.fire({
                            title:'Feedback sent successfully to admin!',
                            type: 'success'
                        })
                    }
                })
            }
        });
    });
</script>
</body>
</html>