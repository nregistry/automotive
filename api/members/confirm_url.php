<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once('../../init/initialization.php');

$d = new DateTime();

$data = array();

$members = new Members();

$url = base_url().'members/forgot.php';

if(!isset($_GET['code'])){
    redirect_to($url);
}

$forgot_code = htmlentities($_GET['code']);

// find user by code 
$current_member = $members->find_by_forgot_code($forgot_code);

if(!$current_member){
    redirect_to($url);
}

// update code to null
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
$members->forgot_code = 'NULL';
$members->created_date = $current_member['created_date'];
$members->edited_date = $d->format("Y-m-d H:i:s");

if($members->update()){
    $success_url = base_url().'members/recover.php?member='.urlencode($members->id);
    redirect_to($success_url);
}