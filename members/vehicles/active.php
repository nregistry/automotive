<?php require_once('../../init/initialization.php');
$title = "Admin || Dashboard";
$page = 'dashboad';
require_once(PUBLIC_PATH  . DS . "layouts" . DS . "users" . DS . "header.php"); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Vehicles</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>members/index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Active Vehicles</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Active Vehicles Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="loadVehicles" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Member</th>
                                <th>Profile</th>
                                <th>Vin Number</th>
                                <th>Production Date</th>
                                <th>Year</th>
                                <th>Model</th>
                                <th>Engine</th>
                                <th>Trans</th>
                                <th>Colors</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "footer.php"); ?>

<script>
    $(document).ready(function() {
        find_vehicles();

        function find_vehicles() {
            var status = 'ACTIVE';
            var dataTable = $('#loadVehicles').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?php echo base_url(); ?>api/vehicles/fetch_active_members_vehicles.php",
                    type: "POST",
                    data: {
                        status: status
                    }
                },
                "autoWidth": false
            });
        }
    });
</script>