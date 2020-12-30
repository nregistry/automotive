<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once('../../init/initialization.php');

$d = new DateTime();

$data = array();

$roles = new Roles();

$roles->role_name = $_POST['role_name'];

$current_role = $roles->find_by_role_name($roles->role_name);

if($current_role){
    $data['message'] = 'existingError';
    echo json_encode($data);
    die();
}

$roles->timestamp = $d->format("Y-m-d H:i:s");

if($roles->save()){
    // admin notification 
    $data['message'] = 'success';
}

echo json_encode($data);