<?php require_once('../init/initialization.php');
$title = 'Admin || Recover Password';
require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "login-header.php");
?>

<p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

<form id="recoverForm" method="post">
    <div class="input-group mb-3">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" name="confirm" id="confirm" class="form-control" placeholder="Confirm Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
        </div>
        <!-- /.col -->
    </div>
</form>

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "login-footer.php"); ?>