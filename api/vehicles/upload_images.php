<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once('../../init/initialization.php');

$vehicle_images = new Vehicle_Images();

// check if there are any files submitted
if(isset($_FILES["file"]["name"])){
    if (count($_FILES["file"]["name"]) > 0) {
        for ($count = 0; $count < count($_FILES["file"]["name"]); $count++) {
            echo $vehicle_images->attach_file($_FILES['name'][$count]);
        }
    }
}