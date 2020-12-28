<?php require_once('../init/initialization.php');
$title = "Admin || Dashboard";
$page = 'success';
require_once(PUBLIC_PATH  . DS . "layouts" . DS . "users" . DS . "header.php"); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Account Success</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>members/index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Success</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Welcome to Automotive!</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h1 class="text-success">
                            Your Account has been successfully created. <br>
                            Please wait for the admin to approve and continue..
                        </h1>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


<?php require_once(PUBLIC_PATH . DS . "layouts" . DS . "users" . DS . "footer.php"); ?>