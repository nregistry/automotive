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
                            <label for="newVehicleRequestsModel">Vehicle Model</label>
                            <select name="model" id="newVehicleRequestsModel" class="form-control">
                                <option selected disabled>Choose Body style</option>
                                <option>SCCA ACR Sedan</option>
                                <option>SCCA ACR Coupe</option>
                                <option>Celebrity Challenge Car Sedan</option>
                                <option>Celebrity Challenge Car Coupe</option>
                                <option>ACR Sedan</option>
                                <option>ACR Coupe</option>
                                <option>Plym. Style Sedan</option>
                                <option>Plym. Style Coupe</option>
                                <option>R/T Sedan</option>
                                <option>R/T Coupe</option>
                                <option>Expresso Sedan</option>
                                <option>Expresso Coupe</option>
                                <option>Base Sedan</option>
                                <option>Base Coupe</option>
                                <option>Highline Sedan</option>
                                <option>Highline Coupe</option>
                                <option>Sport Sedan</option>
                                <option>Sport Coupe</option>
                                <option>SE </option>
                                <option>ES </option>
                                <option>ES+ </option>
                                <option>LE </option>
                                <option>LX </option>
                                <option>SX 2.0</option>
                                <option>Motorsport Edition ES </option>
                                <option>Motorsport Edition R/T </option>
                                <option>Special Edition </option>
                                <option>SXT </option>
                                <option>SRT Design </option>
                                <option>SRT4 </option>
                                <option>SRT4-ACR </option>
                                <option>SRT4 CE/Commemorative Edition </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="newVehicleRequestsEngine">Engine</label>
                            <select name="engine" id="newVehicleRequestsEngine" class="form-control">
                                <option selected disabled>Select the engine</option>
                                <option>1.8 SOHC</option>
                                <option>ECB 2.0 SOHC</option>
                                <option>ECH 2.0 SOHC Magnum </option>
                                <option>ECC 2.0 DOHC</option>
                                <option>EDV 2.4 DOHC Turbo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="newVehicleRequestsTrans">Trans</label>
                            <select name="trans" id="newVehicleRequestsTrans" class="form-control">
                                <option selected disabled>Select the transmission</option>
                                <option>DGC - 3 speed Auto </option>
                                <option>DGL - 4 speed Auto </option>
                                <option>DD5 - 5 speed </option>
                                <option>DD4 - 5 speed Perf </option>
                                <option>DDR - 5 speed SRT4 </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="newVehicleRequestsColors">Color</label>
                            <select name="colors" id="newVehicleRequestsColors" class="form-control">
                                <option>Select the color</option>
                                <option>PAW/QAW Slate</option>
                                <option>PB3/QB3 Intense Blue</option>
                                <option>PB5/QB5 Electic Blue</option>
                                <option>PB7/QB7 Patriot Blue</option>
                                <option>PB8/QB8 Midnight Blue</option>
                                <option>PBJ/QBJ Atlantic Blue</option>
                                <option>PBQ/QBQ Steel Blue</option>
                                <option>PBT/QBT Patriot Blue 2</option>
                                <option>PC4/QC4 Lapis Blue</option>
                                <option>PC5/QC5 Iris</option>
                                <option>PCH/QCH Brillant Blue</option>
                                <option>PCN/QCN Amethyst</option>
                                <option>PDM/QDM Mineral Grey</option>
                                <option>PDR/QDR Viper Graphite</option>
                                <option>PE5/QE5 Salsa Red</option>
                                <option>PEI/QEI Inferno Red</option>
                                <option>PF2/QF2 Nitro Yellow Green</option>
                                <option>PG4/QG4 Hunter Green</option>
                                <option>PG8/QG8 Forest green</option>
                                <option>PGR/QGR Shale Green</option>
                                <option>PGS/QGS Emerald Green</option>
                                <option>PGT/QGT Alpine Green</option>
                                <option>PGW/QGW Timberline Green</option>
                                <option>PH1/QH1 Magenta</option>
                                <option>PJP/QJP Medium Fern</option>
                                <option>PJT/QJT Sandstone</option>
                                <option>PKJ/QKJ Almond</option>
                                <option>PLB/QLB Cinnamon Glaze</option>
                                <option>PMT/QMT Cranberry</option>
                                <option>PPE/RFE Spruce</option>
                                <option>PQK/QQK Aqua Pearl</option>
                                <option>PPM/PQM Bright Jade</option>
                                <option>PR4/QR4 Flame Red</option>
                                <option>PRE/QRE Strawberry</option>
                                <option>PRH/QRH Blaze Red</option>
                                <option>PRV/QRV Dark Garnet Red</option>
                                <option>PS2/QS2 Bright Silver</option>
                                <option>PS4/QS4 Platinum</option>
                                <option>PVK/QVK Orange Blast</option>
                                <option>PTE/QTE Champangne</option>
                                <option>PW1/QW1 Stone White</option>
                                <option>PW7/QW7 Bright White</option>
                                <option>PX8/QX8 Black</option>
                                <option>PYH/QYH Solar Yellow</option>
                            </select>
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