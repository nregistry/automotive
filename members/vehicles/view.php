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
                    <li class="breadcrumb-item active">Property</li>
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
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a href="https://images.unsplash.com/flagged/photo-1564153296137-400b51e1ff6d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=789&q=80" data-toggle="lightbox" data-title="bonet" data-gallery="gallery">
                                            <img src="https://images.unsplash.com/flagged/photo-1564153296137-400b51e1ff6d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=789&q=80" class="img-fluid mb-2" alt="white sample" />
                                        </a>
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
    });
</script>