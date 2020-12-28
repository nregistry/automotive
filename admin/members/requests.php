<?php require_once('../../init/initialization.php');
$title = "Admin || Members";
$page = 'members';
require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "header.php"); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Members Request</h1>
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
                    <h3 class="card-title">New Requests</h3>
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
                                <th>Approve</th>
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
            var status = 'REQUEST';
            var dataTable = $('#loadMembers').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?php echo base_url(); ?>api/members/fetch_requests.php",
                    type: "POST",
                    data: {
                        status: status
                    }
                },
                "autoWidth": false
            });
        }

        $(document).on('click', '.approve', function() {
            if (confirm('Are you sure?')) {
                var member_id = $(this).attr('id');
                var action = "UPDATE_MEMBER_STATUS";
                $.ajax({
                    url: "<?php echo base_url(); ?>api/members/activate_members.php",
                    type: "POST",
                    data: {
                        action: action,
                        member_id: member_id
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.message == 'success') {
                            toastr.success('You have successfully approve the current member.');
                            $('#loadMembers').DataTable().destroy();
                            find_members();
                        }
                    }
                });
            }else{
                return false;
            }
        });
    });
</script>