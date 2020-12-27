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

$admin_id = htmlentities($_POST['admin_id']);

$current_admin = $admins->find_by_id($admin_id);
	
if(!$current_admin){
    $data['message'] = "errorAdmin";
    echo json_encode($data);
    die();
}
$admins->id = $current_admin['id'];
$admins->admin_fullnames = $current_admin['admin_fullnames'];
$admins->admin_image = $current_admin['admin_image'];
$admins->admin_email = $_POST['email'];
$admins->admin_phone = $current_admin['admin_phone'];
$admins->admin_dob = $current_admin['admin_dob'];
$admins->admin_gender = $current_admin['admin_gender'];
$admins->admin_location = $current_admin['admin_location'];
$admins->admin_username = $_POST['username'];
$admins->forgot_code = $current_admin['forgot_code'];
$admins->created_date = $current_admin['created_date'];
$admins->edited_date = $d->format("Y-m-d H:i:s");

if($admins->update()){
    $data['message'] = "success";
}

echo json_encode($data);