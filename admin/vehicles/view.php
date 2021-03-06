<?php require_once('../../init/initialization.php');
$url = base_url() . 'admin/vehicles/index.php';
if (!$_GET['vehicle']) {
    redirect_to($url);
}
$vehicles = new Vehicles();
$vehicle_id = htmlentities($_GET['vehicle']);
$current_vehicle = $vehicles->find_by_id($vehicle_id);
if (!$current_vehicle) {
    redirect_to($url);
}
$title = "Admin || Vehicle";
$page = 'members';
$members = new Members();
require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "header.php"); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <?php echo htmlentities($current_vehicle['vin_number']); ?>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>members/index.php">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Profile</li>
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
                            <a href="#!" id="<?php echo htmlentities($current_vehicle['id']); ?>" class="viewProfileImageBtn">
                                <img class="profile-user-img img-fluid img-circle" src="<?php echo public_url(); ?>storage/vehicles/<?php echo htmlentities($current_vehicle['profile']); ?>" alt="User profile picture">
                            </a>
                        </div>

                        <h3 class="profile-username text-center">
                            <?php echo htmlentities($current_vehicle['vin_number']); ?>
                        </h3>

                        <p class="text-muted text-center">
                            <?php echo htmlentities($current_vehicle['model']); ?>
                        </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- Settings Box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Settings</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="#" id="<?php echo htmlentities($current_vehicle['id']); ?>" class="nav-link changeProfileBtn">
                                    <i class="fa fa-cog"></i> Change Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" id="<?php echo htmlentities($current_vehicle['id']); ?>" class="nav-link settingsBtn">
                                    <i class="fa fa-cogs"></i> Settings
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <a href="#" id="<?php echo htmlentities($current_vehicle['id']); ?>" class="btn btn-primary btn-block mb-3 transferVehicleBtn">Transfer Vehicle</a>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#about" data-toggle="tab">
                                    About Vehicle
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#vehicle_images" data-toggle="tab">
                                    Vehicle Images
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#member" data-toggle="tab">
                                    Member/ Owner
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="about">
                                <strong><i class="fa fa-calendar-o mr-1"></i> Production Date</strong>
                                <p class="text-muted">
                                    <?php echo htmlentities($current_vehicle['production_date']); ?>
                                </p>
                                <hr>

                                <strong><i class="fa fa-calendar-plus-o mr-1"></i> Production Year</strong>
                                <p class="text-muted">
                                    <?php echo htmlentities($current_vehicle['year']); ?>
                                </p>
                                <hr>

                                <strong><i class="fa fa-cogs mr-1"></i> Engine</strong>
                                <p class="text-muted">
                                    <?php echo htmlentities($current_vehicle['engine']); ?>
                                </p>
                                <hr>

                                <strong><i class="fa fa-camera mr-1"></i> Trans</strong>
                                <p class="text-muted">
                                    <?php echo htmlentities($current_vehicle['trans']); ?>
                                </p>

                                <hr>

                                <strong><i class="fa  fa-contao mr-1"></i> Color</strong>
                                <p class="text-muted">
                                    <?php echo htmlentities($current_vehicle['colors']); ?>
                                </p>
                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                <p class="text-muted"><?php echo htmlentities($current_vehicle['notes']); ?></p>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="vehicle_images">
                                <div id="loadImages" class="row">
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="member">
                                <?php
                                $member_id = htmlentities($current_vehicle['member_id']);
                                $current_member = $members->find_by_id($member_id);
                                ?>
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <img class="profile-user-img img-fluid img-circle" src="<?php echo public_url(); ?>storage/users/<?php echo htmlentities($current_member['image']); ?>" alt="User profile picture">
                                    </div>

                                    <div class="col-md-9 col-sm-12 table-responsive p-0">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Full Names</th>
                                                    <td>
                                                        <?php echo htmlentities($current_member['fullnames']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Phone Number</th>
                                                    <td>
                                                        <?php echo htmlentities($current_member['phone']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Email Address</th>
                                                    <td>
                                                        <?php echo htmlentities($current_member['email']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Date of birth</th>
                                                    <td>
                                                        <?php echo htmlentities($current_member['dob']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Gender</th>
                                                    <td>
                                                        <?php echo htmlentities($current_member['gender']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Location</th>
                                                    <td>
                                                        <?php echo htmlentities($current_member['location']); ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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

    <div class="modal fade" id="changeProfileModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="changeProfileForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Change Profile Image</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="vehicle_id" id="changeProfileVehicleId" />
                        </div>
                        <div class="form-group">
                            <label for="vehicleImage">Logo</label>
                            <input type="file" id="vehicleImage" name="image" />

                            <p class="help-block">Enter car main image here.</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="changeProfileSubmitBtn" class="btn btn-primary">Save Image</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- change logo modals -->

    <div class="modal fade" id="settingsModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="settingsForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Vehicle Settings</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="settingsVehicleId" name="vehicle_id" placeholder="Organization Id">
                        </div>
                        <div class="form-group">
                            <label for="settingsVinNumber">Vin Number</label>
                            <input type="text" class="form-control" id="settingsVinNumber" name="vin_number" placeholder="Enter vin number">
                        </div>
                        <div class="form-group">
                            <label for="settingsModel">Model</label>
                            <input type="text" class="form-control" name="model" id="settingsModel" placeholder="Enter vehicle Model">
                        </div>
                        <div class="form-group">
                            <label for="settingsEngine">Engine</label>
                            <input type="text" class="form-control" name="engine" id="settingsEngine" placeholder="Enter engine">
                        </div>
                        <div class="form-group">
                            <label for="settingsTrns">Trns</label>
                            <input type="text" class="form-control" name="trans" id="settingsTrns" placeholder="Enter Trns">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="settingsSubmitBtn" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- settings modal -->

    <div class="modal fade" id="uploadImagesModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="<?php echo base_url(); ?>api/vehicles/upload_images.php" enctype="multipart/form-data" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Upload Vehicle Images</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="vehicle_id" id="uploadImagesVehicleId" />
                        </div>
                        <div class="form-group">
                            <label for="uploadImagesVal">Images</label>
                            <input type="file" id="uploadImagesVal" name="image[]" multiple />
                            <p id="errorMessage" class="help-block">Select Images here.</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" name="submit" class="btn btn-info" id="uploadImagesSubmitBtn">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- change logo modals -->

    <div class="modal fade" id="transferVehicleModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="transferVehicleForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Transfer Vehicle</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="vehicle_id" id="transferVehicleId" />
                        </div>

                        <div id="transferVehicleAccountsContainer" class="form-group">
                            <label for="transferVehicleAccounts">Accounts</label>
                            <select id="transferVehicleAccounts" class="form-control">
                                <option disabled selected>Choose Accounts</option>
                                <option value="MEMBERS">MEMBERS</option>
                            </select>
                        </div>

                        <div id="transferVehicleMembersContainer" class="form-group">
                            <label for="transferVehicleMembers">Members</label>
                            <select name="member_id" id="transferVehicleMembers" class="form-control">
                                <option disabled selected>Choose Members</option>
                                <?php
                                $members = new Members();
                                $status = 'ACTIVE';
                                $all_members = $members->find_all_by_status($status);
                                if (count($all_members) > 0) {
                                    foreach ($all_members as $member) { ?>
                                        <option value="<?php echo htmlentities($member['id']) ?>">
                                            <?php echo htmlentities($member['fullnames']); ?>
                                        </option>
                                <?php }
                                }
                                ?>
                            </select>
                            <span id="transferVehicleMessage"></span>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- transfer vehicles modals -->


    <div class="modal fade" id="viewProfileImageModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Profile Image</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="viewImageProfileVal" class="img-responsive">
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- change logo modals -->
</section>
<!-- /.content -->

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "footer.php"); ?>


<script>
    $(document).ready(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        var vehicle_id = '<?php echo htmlentities($current_vehicle['id']) ?>';

        // vehicle seeting 
        //1. change profile image
        $('.changeProfileBtn').click(function(event) {
            event.preventDefault();
            var vehicle_id = $(this).attr('id');
            var action = 'FETCH_VEHICLE';
            $.ajax({
                url: "<?php echo base_url(); ?>api/vehicles/vehicles.php",
                type: "POST",
                data: {
                    action: action,
                    vehicle_id: vehicle_id
                },
                dataType: "json",
                success: function(data) {
                    $('#changeProfileVehicleId').val(data.id);
                    $('#changeProfileModal').modal('show');
                }
            });

        });

        $('#changeProfileForm').submit(function(event) {
            event.preventDefault();
            var image = $('#vehicleImage').val();
            if (image == '') {
                toastr.error('Please Select an image to continue...');
                return false;
            } else {
                var extension = image.split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    toastr.error('The file selected is invalid. Please check and try again');
                    $('#vehicleImage').val('');
                    return false;
                } else {
                    $.ajax({
                        url: "<?php echo base_url(); ?>api/vehicles/change_photo.php",
                        type: "POST",
                        data: new FormData(this),
                        dataType: "json",
                        contentType: false, // The content type used when sending data to the server.
                        cache: false, // To unable request pages to be cached
                        processData: false,
                        beforeSend: function() {
                            $("#changeProfileSubmitBtn").html('Uploading..');
                        },
                        success: function(data) {
                            if (data.message == 'success') {
                                toastr.success('Vehicle Main Photo successfully Changed');
                                $("#changeProfileSubmitBtn").html('Success');
                                $("#changeProfileForm")[0].reset();
                                $("#changeProfileModal").modal('hide');
                                location.reload();
                            }
                        }
                    });
                }
            }
        });

        // update info
        $('.settingsBtn').click(function(event) {
            event.preventDefault();
            var vehicle_id = $(this).attr('id');
            var action = 'FETCH_VEHICLE';
            $.ajax({
                url: "<?php echo base_url(); ?>api/vehicles/vehicles.php",
                type: "POST",
                data: {
                    action: action,
                    vehicle_id: vehicle_id
                },
                dataType: "json",
                success: function(data) {
                    $('#settingsVehicleId').val(data.id);
                    $('#settingsVinNumber').val(data.vin_number);
                    $('#settingsModel').val(data.model);
                    $('#settingsEngine').val(data.engine);
                    $('#settingsTrns').val(data.trans);
                    $('#settingsModal').modal('show');
                }
            });
        });

        // submit 
        $('#settingsForm').submit(function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "<?php echo base_url(); ?>api/vehicles/update_vehicle.php",
                type: "POST",
                data: form_data,
                dataType: "json",
                beforeSend: function() {
                    $('#settingsSubmitBtn').html('Loading...');
                },
                success: function(data) {
                    if (data.message == 'success') {
                        location.reload();
                    }
                }
            });
        });


        find_vehicle_images();

        function find_vehicle_images() {
            $.ajax({
                url: "<?php echo base_url(); ?>api/vehicles/fetch_images_for_vehicle.php",
                type: "POST",
                data: {
                    vehicle_id: vehicle_id
                },
                dataType: "json",
                success: function(data) {
                    $('#loadImages').html(data.images);
                }
            });
        }

        $('#transferVehicleMembersContainer').fadeOut(900);
        $('#transferVehicleAdminContainer').fadeOut(900);
        $('#transferVehicleAccountsContainer').fadeIn(800);

        // transfer 
        $('.transferVehicleBtn').click(function(event) {
            event.preventDefault();
            var vehicle_id = $(this).attr('id');
            var action = 'FETCH_VEHICLE';
            $.ajax({
                url: "<?php echo base_url(); ?>api/vehicles/vehicles.php",
                type: "POST",
                data: {
                    action: action,
                    vehicle_id: vehicle_id
                },
                dataType: "json",
                success: function(data) {
                    $('#transferVehicleId').val(data.id);
                    $('#transferVehicleModal').modal('show');
                }
            });
        });

        // check account selected 
        $('#transferVehicleAccounts').on('change', function() {
            var account = $(this).val();
            if (account == 'MEMBERS') {
                $('#transferVehicleMembersContainer').fadeIn(800);
                $('#transferVehicleAccountsContainer').fadeOut(900);
                $('#transferVehicleAdminContainer').fadeOut(900);
            }

            if (account == 'ADMIN') {
                $('#transferVehicleMembersContainer').fadeOut(800);
                $('#transferVehicleAccountsContainer').fadeOut(900);
                $('#transferVehicleAdminContainer').fadeIn(800);
            }
        });

        // submit members
        $('#transferVehicleMembers').on('change', function() {
            var member_id = $(this).val();
            var action = "TRANSFER_TO_MEMBER";
            var vehicle_id = $('#transferVehicleId').val();
            var form_data = 'action=' + action + '&vehicle_id=' + vehicle_id + '&member_id=' + member_id;
            $.ajax({
                url: "<?php echo base_url(); ?>api/vehicles/admin_transfer.php",
                type: "POST",
                data: form_data,
                dataType: "json",
                beforeSend: function() {
                    $('#transferVehicleMessage').html('<br><p class="text-primary">Transferring vehicle</p>');
                },
                success: function(data) {
                    if (data.message == 'success') {
                        $('#transferVehicleMessage').html('<br><p class="text-success">Success</p>');
                        toastr.success('Vehicle Successfully Transfered');
                        $('#transferVehicleMembers').val('');
                        $('#transferVehicleModal').modal('hide');
                        location.reload();
                    }

                    if (data.message == 'sameMember') {
                        $('#transferVehicleMessage').html('<br><p class="text-danger">Error</p>');
                        toastr.error('You cannot transfer a vehicle to the same member');
                        return false;
                    }
                }
            });
        });

        // submit admin
        $('#transferVehicleAdmin').on('change', function() {
            var admin_id = $(this).val();
            var action = "TRANSFER_TO_ADMIN";
            var vehicle_id = $('#transferVehicleId').val();
            var form_data = 'action=' + action + '&vehicle_id=' + vehicle_id + '&admin_id=' + admin_id;
            $.ajax({
                url: "<?php echo base_url(); ?>api/vehicles/member_transfer.php",
                type: "POST",
                data: form_data,
                dataType: "json",
                beforeSend: function() {
                    $('#transferVehicleMessage').html('<br><p class="text-primary">Transferring vehicle</p>');
                },
                success: function(data) {
                    if (data.message == 'success') {
                        $('#transferVehicleMessage').html('<br><p class="text-success">Success</p>');
                        toastr.success('Vehicle Successfully Transfered');
                        $('#transferVehicleMembers').val('');
                        $('#transferVehicleModal').modal('hide');
                        window.location.href = '<?php echo base_url(); ?>members/vehicles/index.php';
                    }
                }
            });
        });


        $('.viewProfileImageBtn').click(function(e) {
            e.preventDefault();
            var vehicle_id = $(this).attr('id');
            var action = 'FETCH_VEHICLE';
            $.ajax({
                url: "<?php echo base_url(); ?>api/vehicles/vehicles.php",
                type: "POST",
                data: {
                    vehicle_id: vehicle_id,
                    action: action
                },
                dataType: "json",
                success: function(data) {
                    $('#viewImageProfileVal').html('<img src="<?php echo public_url(); ?>storage/vehicles/' + data.profile + '" class="img-fluid" style="width: 100%;">')
                    $('#viewProfileImageModal').modal('show');
                }
            });
        });

    });
</script>