<?php
require_once 'assets/php/header.php';
?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="row justify-content-center my-2">
    <div class="col-lg-6 mt-4" id="showAllNotifications">
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        //fetch notification of a user
        fetchNotification();
        function fetchNotification()
        {
            $.ajax({
                url: 'assets/php/process.php',
                method: 'POST',
                data: {action: 'fetchNotification'},
                success: function(response){
                    $('#showAllNotifications').html(response);
                }
            });
        }
        checkNotification();
        function checkNotification()
        {
            $.ajax({
                url: 'assets/php/process.php',
                method: 'POST',
                data: {action: 'checkNotification'},
                success: function(response){
                    $('#checkNotification').html(response);
                }
            });
        }

        //Remove notification

        $('body').on('click', '.btn-close', function(e){
            e.preventDefault();

            notification_id = $(this).attr('id');

            $.ajax({
                url: 'assets/php/process.php',
                method: 'POST',
                data: {notification_id: notification_id},
                success: function(response){
                    checkNotification();
                    fetchNotification();
                }
            });

        });
    });
</script>
</body>
</html>