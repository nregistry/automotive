<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once('../../init/initialization.php');

$d = new DateTime();

$data = array();

$vehicle = new Vehicles();

$vehicle_id = htmlentities($_POST['vehicle_id']);

$current_vehicle = $vehicle->find_by_id($vehicle_id);

if(!$current_vehicle){
    $data['message'] = 'errorVehicle';
    echo json_encode($data);
    die();
}
$vehicle->id = $current_vehicle['id'];
$vehicle->member_id = $current_vehicle['member_id'];
$vehicle->vin_number = $_POST['vin_number'];
$vehicle->profile = $current_vehicle['profile'];
$vehicle->production_date = $current_vehicle['production_date'];
$vehicle->year = $current_vehicle['year'];
$vehicle->model = $_POST['model'];
$vehicle->engine = $_POST['engine'];
$vehicle->trans = $_POST['trans'];
$vehicle->status = $current_vehicle['status'];
$vehicle->colors = $current_vehicle['colors'];
$vehicle->notes = $current_vehicle['notes'];
$vehicle->timestamp = $d->format('Y-m-d H:i:s');

if($vehicle->save()){
    $data['message'] = 'success';
}
echo json_encode($data);