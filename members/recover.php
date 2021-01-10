<?php require_once('../init/initialization.php');
$url = base_url() . 'members/forgot.php';
if (!isset($_GET['member'])) {
    redirect_to($url);
}
$member_id = htmlentities($_GET['member']);
$members = new Members();
$current_member = $members->find_by_id($member_id);
if (!$current_member) {
    redirect_to($url);
}
$title = 'Automotive || Password Recovery';
require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "login-header.php");
?>

<p class="login-box-msg">
    You are only one step a way from your new password, recover your password now.
</p>

<form id="newPasswordForm" method="post">
    <div class="input-group mb-3">
        <input type="hidden" name="member_id" class="form-control" value="<?php echo htmlentities($current_member['id']); ?>">
    </div>
    <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" name="confirm" class="form-control" placeholder="Confirm Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" id="newPasswordSubmitBtn" class="btn btn-primary btn-block">Change password</button>
        </div>
        <!-- /.col -->
    </div>
</form>

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "login-footer.php"); ?>

<script>
    $(document).ready(function(){
        $('#newPasswordForm').submit(function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"<?php echo base_url(); ?>api/members/new_password.php",
                type:"POST",
                data:form_data, 
                dataType:"json",
                beforeSend:function(){
                    $('#newPasswordSubmitBtn').html("Loading...");
                },
                success:function(data){
                    if(data.message == "success"){
                        $('#newPasswordSubmitBtn').html("Success");
                        toastr.success('You have successfully changed your password.');
                        window.location.href = "<?php echo base_url(); ?>members/login.php";
                    }

                    if(data.message == "passwordError"){
                        toastr.error('Please make sure your password match to continue');
                        $('#newPasswordSubmitBtn').html("Error Password");
                        return false;
                    }
                }
            });
        });
    });
</script>