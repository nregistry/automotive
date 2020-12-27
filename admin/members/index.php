<?php require_once('../../init/initialization.php');
$title = "Admin || Members";
$page = 'members';
require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "header.php"); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Members</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>admin/index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Members</li>
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
                    <h3 class="card-title">Members Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="loadMembers" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Profile</th>
                                <th>Full Names</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>More</th>
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

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "footer.php"); ?>

<script>
    $(document).ready(function() {
        find_members();
        function find_members() {
            var status = 'ACTIVE';
            var dataTable = $('#loadMembers').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?php echo base_url(); ?>api/members/fetch.php",
                    type: "POST",
                    data: {
                        status: status
                    }
                },
                "autoWidth": false
            });
        }

        $(document).on('click', '.view', function() {
            var customer_id = $(this).attr('id');
            var action = "FETCH_CUSTOMER";
            $.ajax({
                url: "<?php echo base_url(); ?>api/customers/customers.php",
                type: "POST",
                data: {
                    action: action,
                    customer_id: customer_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.message == 'errorCustomer') {
                        toastr.error('The customer selected does not exist');
                        // .return false;
                    } else {
                        var cust_id = $.trim(data.id);
                        localStorage.setItem('customer_id', cust_id);
                        window.location.href = '<?php echo base_url(); ?>admin/customers/view.php?organization=' + organization_id + '&customer=' + cust_id;
                    }
                }
            });

        });
    });
</script>