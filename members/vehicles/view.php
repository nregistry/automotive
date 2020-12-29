<?php require_once('../../init/initialization.php');
$url = base_url() . 'members/vehicles/index.php';
if (!$_GET['vehicle']) {
    redirect_to($url);
}
$vehicles = new Vehicles();
$vehicle_id = htmlentities($_GET['vehicle']);
$current_vehicle = $vehicles->find_by_id($vehicle_id);
if (!$current_vehicle) {
    redirect_to($url);
}
$title = "Admin || Dashboard";
$page = 'view vehicle';
require_once(PUBLIC_PATH  . DS . "layouts" . DS . "users" . DS . "header.php"); ?>

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
                            <img class="profile-user-img img-fluid img-circle" src="<?php echo public_url(); ?>storage/vehicles/<?php echo htmlentities($current_vehicle['profile']); ?>" alt="User profile picture">
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

                <!-- About Me Box -->
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

                                <strong><i class="fa fa-camera mr-1"></i> Trans</strong>
                                <p class="text-muted">
                                    <?php echo htmlentities($current_vehicle['trans']); ?>
                                </p>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="vehicle_images">
                                <div id="loadImages" class="row">
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="uploadImagesBtn" class="btn btn-primary">Upload Images</button>
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

    <div class="modal fade" id="changeLogoModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="changeLogoForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Change Logo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="organization_id" id="changeLogoOrganizationId" />
                        </div>
                        <div class="form-group">
                            <label for="organizationLogo">Logo</label>
                            <input type="file" id="organizationLogo" name="logo" />

                            <p class="help-block">Enter organization logo here.</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="changeLogoSubmitBtn" class="btn btn-primary">Save Logo</button>
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
                        <h4 class="modal-title">Organization Settings</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="settingsOrganizationId" name="organization_id" placeholder="Organization Id">
                        </div>
                        <div class="form-group">
                            <label for="settingsOrganization">Organization</label>
                            <input type="text" class="form-control" id="settingsOrganization" name="organization" placeholder="Enter organization name">
                        </div>
                        <div class="form-group">
                            <label for="settingsOrganizationEmail">Email address</label>
                            <input type="email" class="form-control" name="organization_email" id="settingsOrganizationEmail" placeholder="Enter Organization Email">
                        </div>
                        <div class="form-group">
                            <label for="settingsOrganizationPhone">Phone Number</label>
                            <input type="text" class="form-control" name="organization_phone" id="settingsOrganizationPhone" placeholder="Enter Organization Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="settingsOrganizationAddress">Address</label>
                            <input type="text" class="form-control" name="organization_address" id="settingsOrganizationAddress" placeholder="Enter Organization Address">
                        </div>
                        <div class="form-group">
                            <label for="settingsOrganizationLocation">Location</label>
                            <input type="text" class="form-control" name="organization_location" id="settingsOrganizationLocation" placeholder="Enter Organization Location">
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
                <form id="uploadImagesForm">
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
                            <input type="file" id="uploadImagesVal" name="images" multiple />
                            <p id="errorMessage" class="help-block">Select Images here.</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="uploadImagesSubmitBtn" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- change logo modals -->

</section>
<!-- /.content -->

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "footer.php"); ?>

<script>
    $(document).ready(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        var vehicle_id = '<?php echo htmlentities($current_vehicle['id']) ?>';

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

        $('#uploadImagesBtn').click(function() {
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
                    $('#uploadImagesVehicleId').val(data.id);
                    $('#uploadImagesModal').modal('show');
                }
            });
        });

        $('#uploadImagesForm').submit(function(event) {
            event.preventDefault();
            var error_images = '';
            var form_data = new FormData();
            // get the number of filea
            var files = $('#uploadImagesVal')[0].files;
            var vehicle_id = $('#uploadImagesVehicleId').val();
            if (files.length > 5) {
                error_images += 'You can not select more than 5 files';
            } else {
                // using for loop through the files selected 
                // in this loop we are selecting file data one by one
                for (var i = 0; i < files.length; i++) {
                    // we are getting name of each file
                    var name = document.getElementById('uploadImagesVal').files[i].name;
                    var ext = name.split('.').pop().toLowerCase();
                    if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        error_images += 'Invalid ' + i + ' File';
                    }
                    // append file names to form data
                    form_data.append('file[]', document.getElementById('uploadImagesVal').files[i]);
                    form_data.append('vehicle_id', vehicle_id);
                }
            }
            if (error_images == '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>api/vehicles/upload_images.php",
                    type: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#errorMessage').html('<br /><label class="text-primary">Uploading...</label>');
                    },
                    success:function(data) {
                        console.log(data);
                    }
                });
            } else {
                $('#uploadImagesVal').val('');
                toastr.error(error_images);
                return false;
            }
        });
    });
</script>