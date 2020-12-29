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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
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
                                <a class="nav-link active" href="#vehicle_images" data-toggle="tab">
                                    Vehicle Images
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="vehicle_images">
                                <div id="loadImages" class="row">
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
        
    });
</script>