<?php require_once('../../init/initialization.php');
$title = "Schedulize || Super Admin";
require_once(PUBLIC_PATH . DS . "layouts" . DS . "super_admin" . DS . "header.php"); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Vehicle Images Table</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>super_admin/index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Table</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-default card-outline">
            <div class="card-header">
                <h3 class="card-title">Columns</h3>
                <div class="card-tools">
                    <a href="#" class="btn btn-primary btn-sm" id="newVehicleImagesTableBtn">
                        <i class="fa fa-plus"></i> Create Table
                    </a>

                    <a href="#" class="btn btn-danger btn-sm" id="deleteVehicleImagesTableBtn">
                        <i class="fa fa-trash"></i> Delete Table
                    </a>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-body">
                <p>This are the fields for Vehicles table.</p>
                <span id="columnsRow"></span>
            </div><!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "super_admin" . DS . "footer.php"); ?>

<script>
    $(document).ready(function() {
        $('#newVehicleImagesTableBtn').click(function(e) {
            e.preventDefault();
            var action = "CREATE_TABLE";
            $.ajax({
                url: "<?php echo base_url(); ?>api/vehicles/vehicle_images_table.php",
                type: "POST",
                data: {
                    action: action
                },
                dataType: "json",
                success: function(data) {
                    if (data.message == "success") {
                        location.reload();
                    }
                }
            });
        });

        find_admin_columns();

        function find_admin_columns() {
            var action = "FETCH_COLUMNS";
            $.ajax({
                url: "<?php echo base_url(); ?>api/vehicles/vehicle_images_table.php",
                type: "POST",
                data: {
                    action: action
                },
                dataType: "json",
                success: function(data) {
                    $('#columnsRow').html(data.output);
                }
            });
        }

        $('#deleteVehicleImagesTableBtn').click(function(e) {
            e.preventDefault();
            if (confirm('Are you sure..?')) {
                var action = "DELETE_TABLE";
                $.ajax({
                    url: "<?php echo base_url(); ?>api/vehicles/vehicle_images_table.php",
                    type: "POST",
                    data: {
                        action: action
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.message == "success") {
                            location.reload();
                        }
                    }
                });
            }else{
                return false;
            }
        });
    })
</script>