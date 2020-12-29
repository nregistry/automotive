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
$vehicle->vin_number = $current_vehicle['vin_number'];
$vehicle->profile = $current_vehicle['profile'];
$vehicle->production_date = $current_vehicle['production_date'];
$vehicle->year = $current_vehicle['year'];
$vehicle->model = $current_vehicle['model'];
$vehicle->engine = $current_vehicle['engine'];
$vehicle->trans = $current_vehicle['trans'];
$vehicle->status = 'ACTIVE';
$vehicle->timestamp = $d->format('Y-m-d H:i:s');

if($vehicle->save()){
    $data['message'] = 'success';
}
echo json_encode($data);