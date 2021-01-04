<?php require_once('../../init/initialization.php');
$url = base_url() . 'admin/members/index.php';
if (!$_GET['member']) {
    redirect_to($url);
}
$members = new Members();
$member_id = htmlentities($_GET['member']);
$current_member = $members->find_by_id($member_id);
if (!$current_member) {
    redirect_to($url);
}
$title = "Admin || Member";
$page = 'members';
require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "header.php"); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?php echo htmlentities($current_member['fullnames']); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/index.php">Home</a></li>
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
                            <?php $role = new Roles();
                            $role_id = htmlentities($current_member['role_id']);
                            $current_role = $role->find_by_id($role_id);
                            ?>
                            <?php echo htmlentities($current_role['role_name']); ?>
                        </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- Settings Box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Settings</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="#" id="<?php echo htmlentities($current_member['id']); ?>" class="nav-link changeRoleBtn">
                                    <i class="fa fa-cog"></i> Change Membership Role
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
                                <a class="nav-link active" href="#activity" data-toggle="tab">
                                    Member Vehicle
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about" data-toggle="tab">
                                    About Member
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane table-responsive" id="activity">
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

                            <div class="tab-pane table-responsive" id="about">
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
    <div class="modal fade" id="changeRoleModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="changeRoleForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Member Settings</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="changeRoleMemberId" name="member_id">
                        </div>

                        <div class="form-group">
                            <?php $roles = new Roles();
                            $role_id = htmlentities($current_member['role_id']);
                            $current_role = $roles->find_by_id($role_id);
                            ?>
                            <label >Current Role</label>
                            <input type="text" class="form-control" disabled  value="<?php echo htmlentities($current_role['role_name']) ?>"/>
                        </div>

                        <div class="form-group">
                            <label for="changeRoleNewRole">Update Role</label>
                            <select name="role_id" id="changeRoleNewRole" class="form-control">
                                <option disabled selected>Choose Role</option>
                                <?php $roles = new Roles();
                                $all_roles = $roles->find_all();
                                if (count($all_roles) > 0) {
                                    foreach ($all_roles as $role) { ?>
                                        <option value="<?php echo htmlentities($role['id']) ?>"><?php echo htmlentities($role['role_name']) ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="changeRoleSubmitBtn" class="btn btn-primary">Update</button>
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

<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "admin" . DS . "footer.php"); ?>

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
                        member_id: member_id
                    }
                },
                "autoWidth": false
            });
        }

        $('.changeRoleBtn').click(function() {
            var member_id = $(this).attr('id');
            var action = "FETCH_MEMBER";
            $.ajax({
                url: "<?php echo base_url(); ?>api/members/members.php",
                type: "POST",
                data: {
                    action: action,
                    member_id: member_id
                },
                dataType: "json",
                success: function(data) {
                    $('#changeRoleMemberId').val(data.id);
                    $('#changeRoleCurrentRole').val(data.role_name);
                    $('#changeRoleModal').modal('show');
                }
            });
        });

        $('#changeRoleForm').submit(function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "<?php echo base_url(); ?>api/members/update_role.php",
                type: "POST",
                data: form_data,
                dataType: "json",
                beforeSend:function(){
                    $('#changeRoleSubmitBtn').html('Loading');
                },
                success: function(data) {
                    if(data.message == 'success'){
                        toastr.success('Successfully updated user role');
                        location.reload();
                    }
                }
            });

        });
    });
</script>