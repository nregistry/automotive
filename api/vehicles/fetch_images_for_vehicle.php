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

$vehicles = new Vehicles();

$vehicle_id = htmlentities($_POST['vehicle_id']);

$current_vehicle = $vehicles->find_by_id($vehicle_id);

if(!$current_vehicle){
    $data['message'] = 'errorVehicle';
    echo json_encode($data);
    die();
}

$vehicle_images  = new Vehicle_Images();

$images = $vehicle_images->find_all_by_vehicle_id($current_vehicle['id']);

$num_vehicles = count($images);

$output = '';
if($num_vehicles > 0) {
    foreach ($images as $image) {
        $output .= '<div class="col-sm-2">';
        $output .= '<a href="' . public_url() . 'storage/vehicles/' . $image['image'] . '" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">';
        $output .= '<img src="' . public_url() . 'storage/vehicles/' . $image['image'] . '" class="img-fluid mb-2" alt="white sample" />';
        $output .= '</a>';
        $output .= '</div>';
    }
} else {
    $output .= '<div class="col-sm-2">';
    $output .= '<a href="' . public_url() . 'storage/vehicles/noimage.png" data-toggle="lightbox" data-title="Vehicle Images" data-gallery="gallery">';
    $output .= '<img src="' . public_url() . 'storage/vehicles/noimage.png" class="img-fluid mb-2" alt="white sample" />';
    $output .= '</a>';
    $output .= '</div>';
}

$data['num_images'] = $num_vehicles;
$data['images'] = $output;

echo json_encode($data);