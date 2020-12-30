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

$vehicle->admin_id = 0;
$vehicle->member_id = $_POST['member_id'];
$vehicle->vin_number = $_POST['vin_number'];
$vehicle->profile = 'noimage.png';
$vehicle->production_date = $_POST['production_date'];
$p_date = new DateTime($vehicle->production_date);
$vehicle->year = $p_date->format('Y');
$vehicle->model = $_POST['model'];
$vehicle->engine = $_POST['engine'];
$vehicle->trans = $_POST['trans'];
$vehicle->status = 'REQUEST';
$vehicle->timestamp = $d->format('Y-m-d H:i:s');

if($vehicle->save()){
    $data['message'] = 'success';
}
echo json_encode($data);