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

$member_id = htmlentities($_POST['member_id']);

$current_member = $members->find_by_id($member_id);

if(!$current_member){
    $data['message'] = 'errorMember';
    echo json_encode($data);
    die();
}
$members->id = $current_member['id'];
$members->fullnames = $current_member['fullnames'];
$members->image = $current_member['image'];
$members->phone = $current_member['phone'];
$members->email = $current_member['email'];
$members->dob = $current_member['dob'];
$members->gender = $current_member['gender'];
$members->location = $current_member['location'];
$members->status = 'ACTIVE';
$members->username = $current_member['username'];
$members->forgot_code = $current_member['forgot_code'];
$members->created_date = $current_member['created_date'];
$members->edited_date = $d->format("Y-m-d H:i:s");
if($members->update()){
    // admin notification 
    $data['message'] = 'success';
}

echo json_encode($data);