<?php require_once('../../init/initialization.php');
$title = "Admin || Members";
$page = 'members';
require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "header.php"); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Roles</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>admin/index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Roles</li>
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
                    <h3 class="card-title">Roles Table</h3>
                    <div class="card-tools">
                        <a href="#" id="newRoleBtn" class="btn btn-tool btn-sm btn-success">
                            <i class="fa fa-plus"></i> NEW ROLE
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="loadRoles" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Member Role</th>
                                <th>Delete</th>
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
    <div class="modal fade" id="newRoleModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="newRoleForm" autocomplete="off">
                    <div class="modal-header">
                        <h4 class="modal-title">New Role</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="newRoleName">Role Name</label>
                            <select name="role_name" id="newRoleName" class="form-control">
                                <option selected disabled>Choose member role</option>
                                <option value="MEMBER">MEMBER</option>
                                <option value="GUEST">GUEST</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="newRoleSubmitBtn" class="btn btn-primary">Save</button>
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

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "footer.php"); ?>

<script>
    $(document).ready(function() {
        find_roles();

        function find_roles() {
            var status = 'ACTIVE';
            var dataTable = $('#loadRoles').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?php echo base_url(); ?>api/roles/fetch.php",
                    type: "POST",
                    data: {
                        status: status
                    }
                },
                "autoWidth": false
            });
        }

        // new role
        $('#newRoleBtn').click(function() {
            $('#newRoleForm')[0].reset();
            $('#newRoleModal').modal('show');
        });

        $('#newRoleForm').submit(function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "<?php echo base_url(); ?>api/roles/new_role.php",
                type: "POST",
                data: form_data,
                dataType: "json",
                beforeSend:function(){
                    $('#newRoleSubmitBtn').html('Loading...');
                },
                success: function(data) {
                    if(data.message == 'success'){
                        $('#newRoleSubmitBtn').html('Success');
                        $('#loadRoles').DataTable().destroy();
                        find_roles();
                        $('#newRoleForm')[0].reset();
                        $('#newRoleModal').modal('hide');
                    }

                    if(data.message == 'existingError'){
                        $('#newRoleSubmitBtn').html('Error');
                        toastr.error('The role name selected exists. Please check on this and try again...');
                        return false;
                    }
                }
            });
        });

        $(document).on('click', '.delete', function() {
            if (confirm('Are you sure?')) {
                var role_id = $(this).attr('id');
                var action = "DELETE_ROLE";
                $.ajax({
                    url: "<?php echo base_url(); ?>api/roles/roles.php",
                    type: "POST",
                    data: {
                        action: action,
                        role_id: role_id
                    },
                    dataType: "json",
                    success: function(data) {
                        if(data.message == 'success'){
                            toastr.success('The role name has been successfully removed');
                            $('#loadRoles').DataTable().destroy();
                            find_roles();
                        }
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>