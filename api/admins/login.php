<?php 
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once('../../init/initialization.php');

$data = array();

$d = new DateTime();

$admins = new Admins();

$admin_email = htmlentities($_POST['email']);

$admin_password = htmlentities($_POST['password']);

$current_admin = $admins->authenticate($admin_email, $admin_password);

if($current_admin){
    $type = "ADMIN";
    $session->login($current_admin, $type);
    $data['message'] = "success";
    echo json_encode($data);
}else{
    $data['message'] = "errorAdmin";
    echo json_encode($data);
}