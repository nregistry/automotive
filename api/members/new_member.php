<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('../../init/initialization.php');

$d = new DateTime();

$data = array();

$members = new Members();

$password = $_POST['password'];
$confirm = $_POST['confirm'];

if($password !== $confirm){
    $data['message'] = 'errorPassword';
    echo json_encode($data);
    die();
}
$roles = new Roles();
$role_name = 'GUEST';
$current_role = $roles->find_by_role_name($role_name);
if(!$current_role){
    $data['message'] = 'errorRole';
    echo json_encode($data);
    die();
}
$members->role_id = $current_role['id'];
$members->fullnames = $_POST['fullnames'];
$members->image = 'noimage.png';
$members->phone = 'NULL';
$members->email = $_POST['email'];
$check_email = $members->find_by_email($members->email);
if($check_email){
    $data['message'] = 'emailExists';
    echo json_encode($data);
    die();
}
$members->dob = $d->format("Y-m-d");
$members->gender = "NULL";
$members->location = $_POST['location'];
$members->status = 'REQUEST';
$members->username = $members->fullnames;
$members->password = $password;
$members->confirm_password = $confirm;
$members->forgot_code = 'NULL';
$members->created_date = $d->format("Y-m-d H:i:s");
$members->edited_date = $d->format("Y-m-d H:i:s");
if($members->save()){
    // admin notification 
    $data['message'] = 'success';
}

echo json_encode($data);