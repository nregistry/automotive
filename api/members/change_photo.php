<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once('../../init/initialization.php');

$d = new DateTime();

$data = array();

$member_id = htmlentities($_POST['member_id']);

$members = new Members();

$current_member = $members->find_by_id($member_id);

if(!$current_member){
    $data['message'] = "memberError";
    echo json_encode($data);
    die();
}

if(isset($_FILES['photo']['name'])){

    $members->id = $current_member['id'];
    $members->role_id = $current_member['role_id'];
    $members->fullnames = $current_member['fullnames'];
    $members->attach_file($_FILES['photo']);
    $members->phone = $current_member['phone'];
    $members->email = $current_member['email'];
    $members->dob = $current_member['dob'];
    $members->gender = $current_member['gender'];
    $members->location = $current_member['location'];
    $members->username = $current_member['username'];
    $members->forgot_code = $current_member['forgot_code'];
    $members->status = $current_member['status'];
    $members->created_date = $current_member['created_date'];
    $members->edited_date = $d->format('Y-m-d H:i:s');

    if($members->save_image()){
        $data['message'] = "success";
    }
}

echo json_encode($data);