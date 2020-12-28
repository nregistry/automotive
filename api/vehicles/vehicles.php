<?php 
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = array();

$d = new DateTime();

require_once('../../init/initialization.php');

$vehicle = new Vehicles();

if($_POST["action"] == "FETCH_VEHICLE"){
    $vehicle_id =  htmlentities($_POST['vehicle_id']);
    $current_vehicle = $vehicle->find_by_id($vehicle_id);
    if(!$current_vehicle){
        $data['message'] = 'errorVehicle';
        echo json_encode($data);
    }
    echo json_encode($current_vehicle);
}