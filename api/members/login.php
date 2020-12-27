<?php 
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once('../../init/initialization.php');

$data = array();

$d = new DateTime();

$members = new Members();

$email = htmlentities($_POST['email']);

$password = htmlentities($_POST['password']);

$current_member = $members->authenticate($email, $password);

if($current_member){
    $type = "USER";
    $session->login($current_member, $type);
    $data['message'] = "success";
    echo json_encode($data);
}else{
    $data['message'] = "errorUser";
    echo json_encode($data);
}