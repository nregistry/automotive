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

$admin_password = htmlentities($_POST['password']);

$current_admin = $admins->find_by_password($admin_id, $admin_password);

if(!$current_admin){
    $data['message'] = "errorAdmin";
    echo json_encode($data);
    die();
}

$new_password = htmlentities($_POST['new_password']);
$confirm = htmlentities($_POST['confirm']);

if($new_password !== $confirm){
    $data['message'] = "errorPassword";
    echo json_encode($data);
    die();
}

// update password 
$admins->id = $current_admin['id'];
$admins->password = $new_password;
$admins->confirm_password = $confirm;
$admins->edited_date = $d->format('Y-m-d H:i:s');

if($admins->update_password()){
    $data['message'] = 'success';
}

echo json_encode($data);