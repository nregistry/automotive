<?php require_once('../init/initialization.php');
$title = 'Admin || Register';
require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "login-header.php");
?>

<p class="login-box-msg">Register a new membership</p>

<form id="registerForm" method="post">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Full name">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Retype password">
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
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <!-- /.col -->
    </div>
</form>

<a href="<?php echo base_url(); ?>admin/login.php" class="text-center">I already have a membership</a>

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "login-footer.php"); ?>