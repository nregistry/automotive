<?php require_once('../../init/initialization.php');
$back_url = base_url() . 'members/members/index.php';
if (!$_GET['member']) {
    redirect_to($back_url);
}
$member_id = htmlentities($_GET['member']);
$members = new Members();
$current_member = $members->find_by_id($member_id);
if (!$current_member) {
    redirect_to($back_url);
}
$title = "Admin || Members";
$page = 'dashboad';
require_once(PUBLIC_PATH  . DS . "layouts" . DS . "users" . DS . "header.php"); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo htmlentities($current_member['fullnames']); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>members/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Member Profile</li>
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
                            <img class="profile-user-img img-fluid img-circle" src="<?php echo public_url(); ?>storage/users/<?php echo htmlentities($current_member['image']); ?>" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">
                            <?php echo htmlentities($current_member['username']); ?>
                        </h3>
                        <p class="text-muted text-center">
                            <?php echo htmlentities($current_member['email']); ?>
                        </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fa fa-user mr-1"></i> Full Names</strong>

                        <p class="text-muted">
                            <?php echo htmlentities($current_member['fullnames']); ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-mobile-phone mr-1"></i> Phone Number</strong>

                        <p class="text-muted">
                            <?php echo htmlentities($current_member['phone']); ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-calendar-minus-o mr-1"></i> Date of Birth</strong>

                        <p class="text-muted">
                            <?php echo htmlentities($current_member['dob']); ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-hourglass-3 mr-1"></i> Gender</strong>

                        <p class="text-muted">
                            <?php echo htmlentities($current_member['gender']); ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-map mr-1"></i> Location</strong>

                        <p class="text-muted">
                            <?php echo htmlentities($current_member['location']); ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-wrench mr-1"></i> Status</strong>

                        <p class="text-muted">
                            <?php if ($current_member['status'] == 'ACTIVE') { ?>
                                <span class="badge badge-success">
                                    <?php echo htmlentities($current_member['status']); ?>
                                </span>
                            <?php } else { ?>
                                <span class="badge badge-danger">
                                    <?php echo htmlentities($current_member['status']); ?>
                                </span>
                            <?php } ?>
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
                                <a class="nav-link active" href="#memberVehicle" data-toggle="tab">
                                    Member Vehicle
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane table-responsive" id="memberVehicle">
                                <table id="loadMemberVehicles" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Profile</th>
                                            <th>Vin Number</th>
                                            <th>Production Date</th>
                                            <th>Year</th>
                                            <th>Model</th>
                                            <th>Engine</th>
                                            <th>Trans</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "footer.php"); ?>

<script>
    $(document).ready(function() {
        find_vehicles();
        function find_vehicles() {
            var status = 'ACTIVE';
            var member_id = '<?php echo htmlentities($current_member['id']); ?>';
            var dataTable = $('#loadMemberVehicles').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?php echo base_url(); ?>api/vehicles/fetch_for_particular_member.php",
                    type: "POST",
                    data: {
                        status: status,
                        member_id:member_id
                    }
                },
                "autoWidth": false
            });
        }
    });
</script>