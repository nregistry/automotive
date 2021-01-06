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

$vehicle->member_id = $_POST['member_id'];
$vehicle->vin_number = $_POST['vin_number'];
$vehicle->profile = 'noimage.png';
$vehicle->production_date = '12/04/2000 - 12/03/2000';
$vehicle->year = '2000';
$vehicle->model = $_POST['model'];
$vehicle->engine = $_POST['engine'];
$vehicle->trans = $_POST['trans'];
$vehicle->status = 'REQUEST';
$vehicle->colors = $_POST['colors'];
$vehicle->notes = $_POST['notes'];
$vehicle->timestamp = $d->format('Y-m-d H:i:s');

if($vehicle->save()){
    $data['message'] = 'success';
}
echo json_encode($data);