<?php
$url = base_url() . "members/login.php";
if (!$session->is_logged_in()) {
    redirect_to($url);
}
// check is user
if (!$session->check_user()) {
    $session->logout();
    redirect_to($url);
}

if ($session->user_type != "USER") {
    $session->logout();
    redirect_to($url);
}

$user_id = htmlentities($session->user_id);

$members = new Members();

$current_members = $members->find_by_id($user_id);

if (!$current_members) {
    $session->logout();
    redirect_to($url);
}

$status = htmlentities($current_members['status']);
$suucess_url = base_url() . 'members/success.php';
if ($status == 'REQUEST') {
    if ($page != 'success') {
        redirect_to($suucess_url);
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
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="<?php echo public_url(); ?>back/plugins/ekko-lightbox/ekko-lightbox.css">
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
                    <a href="<?php echo base_url(); ?>users/index.php" class="nav-link">Dashboard</a>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->
        <?php include('navbar.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">