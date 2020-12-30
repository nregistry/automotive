<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = array();

$d = new DateTime();

require_once('../../init/initialization.php');

$roles = new Roles();

if($_POST["action"] == "FETCH_ROLE"){
    $role_id =  htmlentities($_POST['role_id']);
    $current_role = $roles->find_by_id($role_id);
    if(!$current_role){
        $data['message'] = 'errorRole';
        echo json_encode($data);
    }
    echo json_encode($current_role);
}

if($_POST["action"] == "DELETE_ROLE"){
    $role_id =  htmlentities($_POST['role_id']);
    $current_role = $roles->find_by_id($role_id);
    if(!$current_role){
        $data['message'] = 'errorRole';
        echo json_encode($data);
    }
    if($roles->delete($current_role['id'])){
        $data['message'] = 'success';
    }
    echo json_encode($data);
}
