<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once('../../init/initialization.php');

$d = new DateTime();

$data = array();

$vehicle_id = htmlentities($_POST['vehicle_id']);

$vehicle = new Vehicles();

$current_vehicle = $vehicle->find_by_id($vehicle_id);

if (!$current_vehicle) {
    $data['message'] = "vehicleError";
    echo json_encode($data);
    die();
}

if (isset($_FILES['image']['name'])) {
    $vehicle->id = $current_vehicle['id'];
    $vehicle->member_id = $current_vehicle['member_id'];
    $vehicle->vin_number = $current_vehicle['vin_number'];
    $vehicle->attach_file($_FILES['image']);
    $vehicle->production_date = $current_vehicle['production_date'];
    $vehicle->year = $current_vehicle['year'];
    $vehicle->model = $current_vehicle['model'];
    $vehicle->engine = $current_vehicle['engine'];
    $vehicle->trans = $current_vehicle['trans'];
    $vehicle->status = $current_vehicle['status'];
    $vehicle->colors = $current_vehicle['colors'];
    $vehicle->notes = $current_vehicle['notes'];
    $vehicle->timestamp = $d->format('Y-m-d H:i:s');

    if ($vehicle->save_image()) {
        $data['message'] = "success";
    }
}

echo json_encode($data);
