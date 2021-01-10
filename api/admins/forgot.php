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

$admin_email = htmlentities($_POST['email']);

$current_admin = $admins->find_by_email($admin_email);

if (!$current_admin) {
    $data['message'] = 'errorAdmin';
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
$admins->id = $current_admin['id'];
$admins->admin_fullnames = $current_admin['admin_fullnames'];
$admins->admin_image = $current_admin['admin_image'];
$admins->admin_email = $current_admin['admin_email'];
$admins->admin_phone = $current_admin['admin_phone'];
$admins->admin_dob = $current_admin['admin_dob'];
$admins->admin_gender = $current_admin['admin_gender'];
$admins->admin_status = $current_admin['admin_status'];
$admins->admin_location = $current_admin['admin_location'];
$admins->admin_username = $current_admin['admin_username'];
$admins->forgot_code = $code;
$admins->created_date = $current_admin['created_date'];
$admins->edited_date = $d->format("Y-m-d H:i:s");

if ($admins->update()) {
    $to_mail .= $admins->admin_email;
    $username .= $admins->admin_email;
    $message .= "<p>Your request to change password has been received. </p>";
    $message .= "<p>Please click the following link to continue.</p>";
    $message .= "<hr/>";
    // define the mail values
    $link .= "<p><a href=" . base_url() . "api/admins/confirm_url.php?code=" . urlencode($admins->forgot_code) . ">" . base_url() . "api/admins/confirm_url.php?code=" .  urlencode($admins->forgot_code) . "</a></p>";
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