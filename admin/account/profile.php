<?php require_once('../../init/initialization.php');
$title = "Admin || Dashboard";
$page = 'profile';
require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "header.php"); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Admin Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Admin Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <span id="adminProfileImage"></span>
                        </div>
                        <h3 id="adminProfileUserName" class="profile-username text-center">
                        </h3>
                        <p id="adminProfileEmailAddress" class="text-muted text-center"></p>
                        <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- Admin Settings -->
                <div class="card">
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="#" class="nav-link" id="changePhotoBtn">
                                    <i class="fa fa-file-photo-o"></i> Change Photo
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="settingsBtn">
                                    <i class="fa fa-cogs"></i> Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="accountSettingsBtn">
                                    <i class="fa fa-user-secret"></i> Account Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="changePasswordBtn">
                                    <i class="fa fa-cog"></i> Change Password
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#activity" data-toggle="tab">
                                    About Me
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <strong><i class="fa fa-user mr-1"></i> Full Names</strong>
                                <p id="adminProfileFullNames" class="text-muted"></p>
                                <hr>

                                <strong><i class="fa fa-mobile-phone mr-1"></i> Phone Number</strong>
                                <p id="adminProfilePhone" class="text-muted"></p>
                                <hr>

                                <strong><i class="fa fa-calendar-minus-o mr-1"></i> Date of Birth</strong>
                                <p id="adminProfileDOB" class="text-muted"></p>
                                <hr>

                                <strong><i class="fa fa-hourglass-3 mr-1"></i> Gender</strong>
                                <p id="adminProfileGender" class="text-muted"></p>
                                <hr>

                                <strong><i class="fa fa-map mr-1"></i> Location</strong>
                                <p id="adminProfileLocation" class="text-muted"></p>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="modal fade" id="changePhotoModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="changePhotoForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Change Photo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="changePhotoAdminId" name="admin_id" class="form-control" placeholder="Enter Customer Full Names">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Change Photo</label>
                            <input type="file" name="photo" id="adminProfilePic">

                            <p class="help-block">Upload New Profile pic here.</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="changePhotoSubmitBtn" class="btn btn-primary">Save Profile</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="settingsModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="settingsForm" autocomplete="off">
                    <div class="modal-header">
                        <h4 class="modal-title">Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="settingsAdminId" class="form-control" name="admin_id" />
                        </div>
                        <div class="form-group">
                            <label for="settingsFullNames">Full Names</label>
                            <input type="text" id="settingsFullNames" class="form-control" name="fullnames" placeholder="Enter Admin Full Names" />
                        </div>

                        <div class="form-group">
                            <label for="settingsPhone">Phone Number</label>
                            <input type="text" id="settingsPhone" class="form-control" name="phone" placeholder="Enter Phone Number" />
                        </div>

                        <div class="form-group">
                            <label for="settingsDOB">Date of Birth</label>
                            <input type="text" id="settingsDOB" class="form-control datepicker" name="dob" placeholder="Enter Date of Birth" />
                        </div>

                        <div class="form-group">
                            <label for="settingsGender">Gender</label>
                            <select name="gender" id="settingsGender" class="form-control">
                                <option disabled selected>Choose Gender</option>
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="settingsLocation">Location</label>
                            <input type="text" id="settingsLocation" class="form-control" name="location" placeholder="Enter Location" />
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="settingsSubmitBtn" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="accountSettingsModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="accountSettingsForm" autocomplete="off">
                    <div class="modal-header">
                        <h4 class="modal-title">Account Settings</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="settingsAccountAdminId" class="form-control" name="admin_id" />
                        </div>
                        <div class="form-group">
                            <label for="settingsAccountEmail">Email Address</label>
                            <input type="email" id="settingsAccountEmail" class="form-control" name="email" placeholder="Enter Admin Email Address" />
                        </div>

                        <div class="form-group">
                            <label for="settingsAccountUsername">User Name</label>
                            <input type="text" id="settingsAccountUsername" class="form-control" name="username" placeholder="Enter Username" />
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="accountSettingsSubmitBtn" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="changePasswordModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="changePasswordForm" autocomplete="off">
                    <div class="modal-header">
                        <h4 class="modal-title">Change Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="changePasswordAdminId" class="form-control" name="admin_id" />
                        </div>
                        <div class="form-group">
                            <label for="changePasswordCurrentPassword">Current Password</label>
                            <input type="password" id="changePasswordCurrentPassword" class="form-control" name="password" placeholder="Enter Current Password" required />
                        </div>

                        <div class="form-group">
                            <label for="changePasswordNewPassword">New Password</label>
                            <input type="password" id="changePasswordNewPassword" class="form-control" name="new_password" placeholder="Enter New Password" required />
                        </div>

                        <div class="form-group">
                            <label for="changePasswordConfirmPassword">Confirm Password</label>
                            <input type="password" id="changePasswordConfirmPassword" class="form-control" name="confirm" placeholder="Retype Password" required />
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="changePasswordSubmitBtn" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section>
<!-- /.content -->

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "footer.php"); ?>

<script>
    $(document).ready(function() {

        $('#changePhotoBtn').click(function() {
            var action = "FETCH_LOGGED_IN_ADMIN";
            $.ajax({
                url: "<?php echo base_url(); ?>api/admins/admins.php",
                type: "POST",
                data: {
                    action: action
                },
                dataType: "json",
                success: function(data) {
                    $('#changePhotoAdminId').val(data.id);
                    $('#changePhotoModal').modal('show');
                }
            });
        });

        $('#changePhotoForm').submit(function(event) {
            event.preventDefault();
            var photo = $('#adminProfilePic').val();
            if (photo == '') {
                toastr.error('Please Select an image to continue...');
                return false;
            } else {
                var extension = photo.split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    toastr.error('The file selected is invalid. Please check and try again');
                    $('#adminProfilePic').val('');
                    return false;
                } else {
                    $.ajax({
                        url: "<?php echo base_url(); ?>api/admins/change_photo.php",
                        type: "POST",
                        data: new FormData(this),
                        dataType: "json",
                        contentType: false, // The content type used when sending data to the server.
                        cache: false, // To unable request pages to be cached
                        processData: false,
                        beforeSend: function() {
                            $("#changePhotoSubmitBtn").html('Uploading..');
                        },
                        success: function(data) {
                            if (data.message == 'success') {
                                toastr.success('Product successfully added');
                                $("#changePhotoSubmitBtn").html('Success');
                                $('#changePhotoForm')[0].reset();
                                $('#changePhotoModal').modal('hide');
                                location.reload();
                            }
                        }
                    });
                }
            }
        });

        // settings 
        $('#settingsBtn').click(function() {
            var action = "FETCH_LOGGED_IN_ADMIN";
            $.ajax({
                url: "<?php echo base_url(); ?>api/admins/admins.php",
                type: "POST",
                data: {
                    action: action
                },
                dataType: "json",
                success: function(data) {
                    $('#settingsAdminId').val(data.id);
                    $('#settingsFullNames').val(data.admin_fullnames);
                    $('#settingsPhone').val(data.admin_phone);
                    $('#settingsDOB').val(data.admin_dob);
                    $('#settingsAddress').val(data.admin_address);
                    $('#settingsLocation').val(data.admin_location);
                    $('#settingsModal').modal('show');
                }
            });
        });

        $('#settingsForm').submit(function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "<?php echo base_url(); ?>api/admins/update_admins.php",
                type: "POST",
                data: form_data,
                dataType: "json",
                beforeSend: function() {
                    $('#settingsSubmitBtn').html('Loading..');
                },
                success: function(data) {
                    if (data.message == 'success') {
                        $('#settingsSubmitBtn').html('Save changes');
                        $('#settingsForm')[0].reset();
                        $('#settingsModal').modal('hide');
                        location.reload();
                    }
                }
            });
        });

        /// Account Settings
        $('#accountSettingsBtn').click(function() {
            var action = "FETCH_LOGGED_IN_ADMIN";
            $.ajax({
                url: "<?php echo base_url(); ?>api/admins/admins.php",
                type: "POST",
                data: {
                    action: action
                },
                dataType: "json",
                success: function(data) {
                    $('#settingsAccountAdminId').val(data.id);
                    $('#settingsAccountEmail').val(data.admin_email);
                    $('#settingsPhone').val(data.admin_phone);
                    $('#settingsAccountUsername').val(data.admin_username);
                    $('#accountSettingsModal').modal('show');
                }
            });
        });

        // submit account settings form
        $('#accountSettingsForm').submit(function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "<?php echo base_url(); ?>api/admins/update_account.php",
                type: "POST",
                data: form_data,
                dataType: "json",
                beforeSend: function() {
                    $('#accountSettingsSubmitBtn').html('Loading..');
                },
                success: function(data) {
                    if (data.message == 'success') {
                        toastr.success('Successfully updated account details.');
                        $('#accountSettingsSubmitBtn').html('Save changes');
                        $('#accountSettingsForm')[0].reset();
                        $('#accountSettingsModal').modal('hide');
                        location.reload();
                    }
                }
            });

        });

        // change password
        $('#changePasswordBtn').click(function() {
            var action = "FETCH_LOGGED_IN_ADMIN";
            $.ajax({
                url: "<?php echo base_url(); ?>api/admins/admins.php",
                type: "POST",
                data: {
                    action: action
                },
                dataType: "json",
                success: function(data) {
                    $('#changePasswordAdminId').val(data.id);
                    $('#changePasswordModal').modal('show');
                }
            });
        });

        // submit password
        $('#changePasswordForm').submit(function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "<?php echo base_url(); ?>api/admins/update_password.php",
                type: "POST",
                data: form_data,
                dataType: "json",
                beforeSend: function() {
                    $('#changePasswordSubmitBtn').html('Loading...');
                },
                success: function(data) {
                    if (data.message == 'errorAdmin') {
                        toastr.error('Please check on the password entered.');
                        $('#changePasswordForm')[0].reset();
                        $('#changePasswordModal').modal('hide');
                        logout();
                    }

                    if (data.message == 'errorPassword') {
                        toastr.error('Password entered do not match. Please check on this to continue');
                        $('#changePasswordForm')[0].reset();
                        $('#changePasswordModal').modal('hide');
                    }

                    if (data.message == 'success') {
                        toastr.success('Password successfully updated');
                        $('#changePasswordForm')[0].reset();
                        $('#changePasswordModal').modal('hide');
                        location.reload();
                    }
                }
            });
        });

        function logout() {
            var action = "LOGOUT";
            $.ajax({
                url: "<?php echo base_url(); ?>api/admins/admins.php",
                type: "POST",
                data: {
                    action: action
                },
                dataType: "json",
                success: function(data) {
                    if (data.message == "success") {
                        localStorage.clear();
                        window.location.href = "<?php echo base_url(); ?>admin/login.php";
                    }
                }
            });
        }
    });
</script>