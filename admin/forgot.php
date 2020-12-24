<?php require_once('../init/initialization.php');
$title = 'Admin || Forgot';
require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "login-header.php");
?>

<p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

<form id="forgotForm" method="post">
    <div class="input-group mb-3">
        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
        </div>
        <!-- /.col -->
    </div>
</form>

<p class="mt-3 mb-1">
    <a href="<?php echo base_url(); ?>admin/login.php">Login</a>
</p>
<p class="mb-0">
    <a href="<?php echo base_url(); ?>admin/register.php" class="text-center">Register a new membership</a>
</p>

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "login-footer.php"); ?>