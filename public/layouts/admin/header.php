<?php
$url = base_url() . "admin/login.php";
if (!$session->is_logged_in()) {
    redirect_to($url);
}
// check is user
if (!$session->check_user()) {
    $session->logout();
    redirect_to($url);
}
// check user type is admin 
if ($session->user_type != 'ADMIN') {
    $session->logout();
    redirect_to($url);
}

$admin_id = htmlentities($session->user_id);

// load organization

$organization = new Organizations();

if (!isset($_GET['organization'])) {
    $session->logout();
    redirect_to($url);
}

$organization_id = htmlentities($_GET['organization']);
$current_org = $organization->find_by_id($organization_id);
if (!$current_org) {
    $session->logout();
    redirect_to($url);
}

// Find admins account
$account = new Accounts();
$account_url = base_url().'admin/admin_account.php?organization='.$current_org['id'];
$admin_account = $account->find_by_admin_id($admin_id);
if (!$admin_account) {
    // no account found for admin
    // redirect to a page admin will select an account 
    redirect_to($account_url);

}

$account_type = htmlentities($admin_account['account_type']);

$payments_url = base_url() . 'admin/payments.php?organization=' . $current_org['id'];

$account_payments = htmlentities($admin_account['payment_status']);
$account_status = htmlentities($admin_account['account_status']);
if (isset($page)) {
    if ($account_payments == 'BALANCE') {
        if ($page != 'payments') {
            redirect_to($payments_url);
        }
    }
    if ($account_status == 'INACTIVE') {
        if ($page != 'payments') {
            redirect_to($payments_url);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php echo htmlentities($title); ?></title>

    <link rel="shortcut icon" type="image/ico" href="<?php echo public_url(); ?>storage/logo/favicon.ico" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo public_url(); ?>fonts/font-awesome/css/font-awesome.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="<?php echo public_url(); ?>fonts/Ionicons/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo public_url(); ?>back/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo public_url(); ?>back/plugins/toastr/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo public_url(); ?>back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo public_url(); ?>back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo public_url(); ?>back/css/adminlte.min.css">
    <!--styles -->
    <link rel="stylesheet" href="<?php echo public_url(); ?>back/css/styles.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url(); ?>index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url(); ?>admin/index.php?organization=<?php echo urlencode($current_org['id']); ?>" class="nav-link">Dashboard</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <?php if ($account_type == 'TRIAL') { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">Account</span>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url(); ?>admin/payments.php?organization=<?php echo urlencode($current_org['id']); ?>" class="dropdown-item">
                                <i class="fa fa-credit-card mr-2"></i> Buy Now
                            </a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.navbar -->
        <?php include('navbar.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">