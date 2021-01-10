<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once('../../init/initialization.php');

$d = new DateTime();

$data = array();

$admin_id = htmlentities($_POST['admin_id']);

$admin = new Admins();

$current_admin = $admin->find_by_id($admin_id);

if(!$current_admin){
    $data['message'] = "adminError";
    echo json_encode($data);
    die();
}

if(isset($_FILES['photo']['name'])){

    $admin->id = $current_admin['id'];
    $admin->admin_fullnames = $current_admin['admin_fullnames'];
    $admin->attach_file($_FILES['photo']);
    $admin->admin_phone = $current_admin['admin_phone'];
    $admin->admin_email = $current_admin['admin_email'];
    $admin->admin_dob = $current_admin['admin_dob'];
    $admin->admin_gender = $current_admin['admin_gender'];
    $admin->admin_status = $current_admin['admin_status'];
    $admin->admin_location = $current_admin['admin_location'];
    $admin->admin_username = $current_admin['admin_username'];
    $admin->forgot_code = $current_admin['forgot_code'];
    $admin->created_date = $current_admin['created_date'];
    $admin->edited_date = $d->format('Y-m-d H:i:s');

    if($admin->save_image()){
        $data['message'] = "success";
    }
}

echo json_encode($data);