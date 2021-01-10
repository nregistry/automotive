<?php require_once('../init/initialization.php');
$title = 'Admin || Register';
require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "login-header.php");
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

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "login-footer.php"); ?>