<?php require_once('../init/initialization.php');
$title = 'Admin || Register';
require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "login-header.php");
?>

<p class="login-box-msg">Register a new membership</p>

<form id="registerForm" method="post">

    <div class="input-group mb-3">
        <input type="text" name="fullnames" class="form-control" placeholder="Full name">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-user"></span>
            </div>
        </div>
    </div>

    <div class="input-group mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-envelope"></span>
            </div>
        </div>
    </div>
    
    <div class="input-group mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" name="confirm" placeholder="Retype password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-lock"></span>
            </div>
        </div>
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" name="location" placeholder="Location">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fa fa-map"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            &nbsp;
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" id="hostsRegistrationSubmitBtn" class="btn btn-primary btn-block">Sign up</button>
        </div>
        <!-- /.col -->
    </div>
</form>

<a href="<?php echo base_url(); ?>members/login.php" class="text-center">I already have a membership</a>

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "login-footer.php"); ?>

<script>
    $(document).ready(function() {

        $('#registerForm').submit(function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "<?php echo base_url(); ?>api/members/new_member.php",
                type: "POST",
                data: form_data,
                dataType: "json",
                beforeSend: function() {
                    $('#hostsRegistrationSubmitBtn').html("Loading...");
                },
                success: function(data) {
                    if (data.message == "success") {
                        $('#hostsRegistrationSubmitBtn').html("Success");
                        toastr.success('You have successfully created an account.');
                        window.location.href = "<?php echo base_url(); ?>members/login.php";
                    }

                    if (data.message == 'emailExists') {
                        toastr.error('Email used already exists. Please check and try again...');
                        $('#hostsRegistrationSubmitBtn').html("Error");
                        return false;
                    }

                    if (data.message == 'errorPassword') {
                        toastr.error('Password entered do not match. Please check on this and try again...');
                        $('#hostsRegistrationSubmitBtn').html("Error Password");
                        return false;
                    }

                    if (data.message == 'errorRole') {
                        toastr.error('Member roles have not been set. Please contact the admin ...');
                        $('#hostsRegistrationSubmitBtn').html("Error Roles");
                        return false;
                    }
                    
                }
            });
        });

        $('#organizationForm').submit(function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "<?php echo base_url(); ?>api/organization/new_organization.php",
                type: "POST",
                data: form_data,
                dataType: "json",
                beforeSend: function() {
                    $('#organizationSubmitBtn').html("Loading...");
                },
                success: function(data) {
                    if (data.message == "success") {
                        $('#organizationSubmitBtn').html("Success");


                    }
                }
            });
        });
    });
</script>