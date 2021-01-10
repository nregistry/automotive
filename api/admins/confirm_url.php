<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once('../../init/initialization.php');

$d = new DateTime();

$data = array();

$admins = new Admins();

$url = base_url().'admin/forgot.php';

if(!isset($_GET['code'])){
    redirect_to($url);
}

$forgot_code = htmlentities($_GET['code']);

// find user by code 
$current_admin = $admins->find_by_forgot_code($forgot_code);

if(!$current_admin){
    redirect_to($url);
}

// update code to null
$admins->id = $current_admin['id'];
$admins->admin_fullnames = $current_admin['admin_fullnames'];
$admins->admin_image = $current_admin['admin_image'];
$admins->admin_email = $current_admin['admin_email'];
$admins->admin_phone = $current_admin['admin_phone'];
$admins->admin_dob = $current_admin['admin_dob'];
$admins->admin_gender = $current_admin['admin_gender'];
$admins->admin_status = $current_admin['admin_status'];
$admins->admin_location = $current_admin['admin_location'];
$admins->admin_username = $current_admin['admin_username'];
$admins->forgot_code = 'NULL';
$admins->created_date = $current_admin['created_date'];
$admins->edited_date = $d->format("Y-m-d H:i:s");

if($admins->update()){
    $success_url = base_url().'admin/recover.php?admin='.urlencode($admins->id);
    redirect_to($success_url);
}