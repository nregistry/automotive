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

$admins = new Admins();

if($_POST['password'] !== $_POST['confirm']){
    $data['message'] = "errorPassword";
    echo json_encode($data);
    die();
}

$admins->admin_fullnames = $_POST['fullnames'];
$admins->admin_image = "noimage.png";
$admins->admin_email = $_POST['email'];

$check_admin_email = $admins->find_by_email($admins->admin_email);

if($check_admin_email){
    $data['message'] = "emailExists";
    echo json_encode($data);
    die();
}

$admins->admin_phone = $_POST['phone'];
$admins->admin_dob = $d->format("Y-m-d");
$admins->admin_gender = $_POST['gender'];
$admins->admin_location = $_POST['location'];
$admins->admin_username = $_POST['username'];
$admins->password = $_POST['password'];
$admins->confirm_password = $_POST['password'];
$admins->forgot_code = "NULL";
$admins->created_date = $d->format("Y-m-d H:i:s");
$admins->edited_date = $d->format("Y-m-d H:i:s");

if($admins->save()){
    $data['message'] = "success";
}

echo json_encode($data);