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

$email = htmlentities($_POST['email']);

$current_member = $members->find_by_email($email);

if (!$current_member) {
    $data['message'] = 'errorMember';
    echo json_encode($data);
    die();
}

///generate random code 
$bytes = 6;
$code = bin2hex(random_bytes($bytes)); 

// send to
$to_mail = "";
$username = "";
$message = "";
$link = "";

// update code 
$members->id = $current_member['id'];
$members->role_id = $current_member['role_id'];
$members->fullnames = $current_member['fullnames'];
$members->image = $current_member['image'];
$members->phone = $current_member['phone'];
$members->email = $current_member['email'];
$members->dob = $current_member['dob'];
$members->gender = $current_member['gender'];
$members->location = $current_member['location'];
$members->status = $current_member['status'];
$members->username = $current_member['username'];
$members->forgot_code = $code;
$members->created_date = $current_member['created_date'];
$members->edited_date = $d->format("Y-m-d H:i:s");

if ($members->update()) {
    $to_mail .= $members->email;
    $username .= $members->username;
    $message .= "<p>Your request to change password has been received. </p>";
    $message .= "<p>Please click the following link to continue.</p>";
    $message .= "<hr/>";
    // define the mail values
    $link .= "<p><a href=" . base_url() . "api/members/confirm_url.php?code=" . urlencode($members->forgot_code) . ">" . base_url() . "api/members/confirm_url.php?code=" .  urlencode($members->forgot_code) . "</a></p>";
    $message .= $link;
    $data['message'] = "codeUpdated";
}

// Instantiation and passing `true` enables exception
$mail = new PHPMailer(true);

// send email after signing up 
$sendMail = new SendMail($mail);

if ($data['message'] == "codeUpdated") {
    // define the mail values 
    $sendMail->from = 'stevekama@mail.com';
    $sendMail->from_username = 'Automotive';
    $sendMail->to = $to_mail;
    $sendMail->to_username = $username;
    $sendMail->subject = 'Welcome To Automotive';
    $sendMail->message = $message;
    // time email was send
    $sendMail->sendtime = $d->format('Y-m-d H:i:s');
    
    if ($sendMail->send_mail()) {
        // save email 
        if ($sendMail->save()) {

            $data['message'] = "success";

            echo json_encode($data);
            die();
        }
    }
    $data['message'] = 'failed';
    $data['error'] = $sendMail->send_mail();
    echo json_encode($data);
}