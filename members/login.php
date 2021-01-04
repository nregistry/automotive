<?php require_once('../init/initialization.php');
$title = 'Admin || Register';
require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "login-header.php");
?>
<p class="login-box-msg">Sign in to start your session</p>

<form id="loginForm" method="post">
    <div class="input-group mb-3">
        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            &nbsp;
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" id="loginSubmitBtn" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
    </div>
</form>

<p class="mb-1">
    <a href="<?php echo base_url(); ?>members/forgot.php">I forgot my password</a>
</p>
<p class="mb-0">
    <a href="<?php echo base_url(); ?>members/register.php" class="text-center">Register a new membership</a>
</p>

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "login-footer.php"); ?>


<script>
    $(document).ready(function(){
        $('#loginForm').submit(function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"<?php echo base_url(); ?>api/members/login.php",
                type:"POST",
                data:form_data, 
                dataType:"json",
                beforeSend:function(){
                    $('#loginSubmitBtn').html("Loading...");
                },
                success:function(data){
                    if(data.message == "success"){
                        toastr.success('You have successfully logged in to your account.');
                        $('#loginSubmitBtn').html("success");
                        window.location.href = "<?php echo base_url(); ?>members/index.php";
                    }

                    if(data.message == "errorUser"){
                        toastr.error('Please make sure you have entered correct username and password to continue');
                        $('#loginSubmitBtn').html("Error");
                        $('#password').val('');
                        return false;
                    }
                }
            });
        });
    });
</script>