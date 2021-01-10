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

$member_id = htmlentities($_POST['member_id']);

$current_member = $members->find_by_id($member_id);

if (!$current_member) {
    $data['message'] = 'errorMember';
    echo json_encode($data);
    die();
}

$new_password = htmlentities($_POST['password']);
$confirm = htmlentities($_POST['confirm']);

if ($new_password !== $confirm) {
    $data['message'] = 'passwordError';
    echo json_encode($data);
    die();
}

$members->id = $current_member['id'];
$members->password = $new_password;
$members->confirm_password = $confirm;
$members->edited_date = $d->format('Y-m-d H:i:s');

if ($members->update_password()) {
    $data['message'] = "success";
}
echo json_encode($data);