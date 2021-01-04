<?php require_once('../../init/initialization.php');
$title = "Admin || Dashboard";
$page = 'vehicle request';
require_once(PUBLIC_PATH  . DS . "layouts" . DS . "users" . DS . "header.php"); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>My Vehicles</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>members/index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Requested Vehicles</li>
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
                    <h3 class="card-title">Requested Vehicles Table</h3>
                    <?php if ($role_name == 'MEMBER') { ?>
                        <div class="card-tools">
                            <a href="#" id="newVehicleRequestBtn" class="btn btn-tool btn-sm btn-success">
                                <i class="fa fa-plus"></i> MAKE REQUEST
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="loadVehicles" class="table table-bordered table-striped">
                        <thead>
                            <tr>
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
    <div class="modal fade" id="newVehicleRequestModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="newVehicleRequestForm" autocomplete="off">
                    <div class="modal-header">
                        <h4 class="modal-title">New Vehicle Request</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="newVehicleRequestsMemberId" class="form-control" name="member_id" />
                        </div>

                        <div class="form-group">
                            <label for="newVehicleRequestsVinNumber">VIN Nunber</label>
                            <input type="text" id="newVehicleRequestsVinNumber" class="form-control" name="vin_number" placeholder="Enter VIN Number" />
                        </div>

                        <div class="form-group">
                            <label for="newVehicleRequestsProductionDate">Production Date</label>
                            <input type="text" id="newVehicleRequestsProductionDate" class="form-control datepicker" name="production_date" placeholder="Enter Vehicle Production Date" />
                        </div>

                        <div class="form-group">
                            <label for="newVehicleRequestsModel">Vehicle Model</label>
                            <input type="text" id="newVehicleRequestsModel" class="form-control" name="model" placeholder="Enter Vehicle Model" />
                        </div>

                        <div class="form-group">
                            <label for="newVehicleRequestsEngine">Engine</label>
                            <input type="text" id="newVehicleRequestsEngine" class="form-control" name="engine" placeholder="Enter Vehicle Engine" />
                        </div>

                        <div class="form-group">
                            <label for="newVehicleRequestsTrans">Trans</label>
                            <input type="text" id="newVehicleRequestsTrans" class="form-control" name="trans" placeholder="Enter Vehicle Trans" />
                        </div>

                        <div class="form-group">
                            <label for="newVehicleRequestsColors">Color</label>
                            <input type="text" id="newVehicleRequestsColors" class="form-control" name="colors" placeholder="Enter Vehicle Color" />
                        </div>

                        <div class="form-group">
                            <label for="newVehicleRequestsNotes">Notes</label>
                            <textarea name="notes" id="newVehicleRequestsNotes" class="form-control" placeholder="Enter Vehicle Notes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="newVehicleRequestsSubmitBtn" class="btn btn-primary">Save</button>
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

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "footer.php"); ?>

<script>
    $(document).ready(function() {
        find_vehicles();

        function find_vehicles() {
            var status = 'REQUEST';
            var dataTable = $('#loadVehicles').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?php echo base_url(); ?>api/vehicles/fetch_for_members.php",
                    type: "POST",
                    data: {
                        status: status
                    }
                },
                "autoWidth": false
            });
        }

        $('#newVehicleRequestBtn').click(function(e) {
            e.preventDefault();
            var action = "FETCH_LOGGED_IN_USER";
            $.ajax({
                url: "<?php echo base_url(); ?>api/members/members.php",
                type: "POST",
                data: {
                    action: action,
                },
                dataType: "json",
                success: function(data) {
                    $('#newVehicleRequestsMemberId').val(data.id);
                    $('#newVehicleRequestModal').modal('show');
                }
            });
        });

        $('#newVehicleRequestForm').submit(function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "<?php echo base_url(); ?>api/vehicles/new_vehicle.php",
                type: "POST",
                data: form_data,
                dataType: "json",
                beforeSend: function() {
                    $('#newVehicleRequestsSubmitBtn').html('Loading...');
                },
                success: function(data) {
                    if (data.message == 'success') {
                        $('#newVehicleRequestsSubmitBtn').html('Success');
                        $('#loadVehicles').DataTable().destroy();
                        find_vehicles();
                        $('#newVehicleRequestForm')[0].reset();
                        $('#newVehicleRequestModal').modal('hide');
                    }
                }
            });
        });

        $(document).on('click', '.view', function() {
            var vehicle_id = $(this).attr('id');
            var action = "FETCH_VEHICLE";
            $.ajax({
                url: "<?php echo base_url(); ?>api/vehicles/vehicles.php",
                type: "POST",
                data: {
                    action: action,
                    vehicle_id: vehicle_id
                },
                dataType: "json",
                success: function(data) {
                    var vehicle_id = $.trim(data.id);
                    localStorage.setItem('vehicle', vehicle_id);
                    window.location.href = '<?php echo base_url(); ?>members/vehicles/view.php?vehicle=' + vehicle_id;
                }
            });
        });
    });
</script>