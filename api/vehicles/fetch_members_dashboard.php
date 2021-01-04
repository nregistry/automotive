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

$member_id  = htmlentities($session->user_id);

$current_member = $members->find_by_id($member_id);

$vehicles = new Vehicles();

$status = $_POST['status'];

$all_vehicles = $vehicles->find_all_by_member_id_and_status($current_member['id'], $status);

$num_vehicles = count($all_vehicles);

$output = '';
$output .= '<table class="table table-striped table-valign-middle">';
$output .= '<thead>';
$output .= '<tr>';
$output .= '<th>Profile</th>';
$output .= '<th>VIN Number</th>';
$output .= '<th>Production Date</th>';
$output .= '<th>Year</th>';
$output .= '<th>Model</th>';
$output .= '<th>Engine</th>';
$output .= '<th>Trans</th>';
$output .= '<th>Color</th>';
$output .= '</tr>';
$output .= '</thead>';
$output .= '<tbody>';
if ($num_vehicles > 0) {

    foreach ($all_vehicles as $vehicle) {
        $output .= '<tr>';
        $output .= '<td><img src="' . public_url() . 'storage/vehicles/' . htmlentities($vehicle["profile"]) . '" alt="Product 1" class="img-circle img-size-32 mr-2"></td>';
        $output .= '<td>' . htmlentities($vehicle["vin_number"]) . '</td>';
        $output .= '<td>' . htmlentities($vehicle["production_date"]) . '</td>';
        $output .= '<td>' . htmlentities($vehicle["year"]) . '</td>';
        $output .= '<td>' . htmlentities($vehicle["model"]) . '</td>';
        $output .= '<td>' . htmlentities($vehicle["engine"]) . '</td>';
        $output .= '<td>' . htmlentities($vehicle["trans"]) . '</td>';
        $output .= '<td>' . htmlentities($vehicle["colors"]) . '</td>';
        $output .= '</tr>';
    }
    
}else{
    $output .= '<tr>';
    $output .= '<td  colspan="7" align="center">';
    $output .= 'No Data Found..';
    $output .= '</td>';
    $output .= '</tr>';
}
$output .= '</tbody>';
$output .= '</table>';
$data['num_vehicles'] = $num_vehicles;
$data['vehicles'] = $output;

echo json_encode($data);
