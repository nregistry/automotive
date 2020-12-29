<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initialize
require_once('../../init/initialization.php');

$data = array();

$d = new DateTime();

$members = new Members();

$status = $_POST['status'];

$all_members = $members->find_all_by_status($status);

$num_members = count($all_members);

$output = '';
$output .= '<table class="table table-striped table-valign-middle">';
$output .= '<thead>';
$output .= '<tr>';
$output .= '<th>Profile</th>';
$output .= '<th>Full Names</th>';
$output .= '<th>Phone Number</th>';
$output .= '<th>Email</th>';
$output .= '<th>Location</th>';
$output .= '</tr>';
$output .= '</thead>';
$output .= '<tbody>';
if ($num_members > 0) {

    foreach ($all_members as $member) {
        $output .= '<tr>';
        $output .= '<td><img src="' . public_url() . 'storage/users/' . htmlentities($member["image"]) . '" alt="Product 1" class="img-circle img-size-32 mr-2"></td>';
        $output .= '<td>' . htmlentities($member["fullnames"]) . '</td>';
        $output .= '<td>' . htmlentities($member["phone"]) . '</td>';
        $output .= '<td>' . htmlentities($member["email"]) . '</td>';
        $output .= '<td>' . htmlentities($member["location"]) . '</td>';
        $output .= '</tr>';
    }
} else {
    $output .= '<tr>';
    $output .= '<td colspan="5" align="center" class="text-danger">No Members Found..</td>';
    $output .= '</tr>';
}
$output .= '</tbody>';
$output .= '</table>';

$data['num_members'] = $num_members;
$data['members'] = $output;

echo json_encode($data);
