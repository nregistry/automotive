<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once('../../init/initialization.php');

$d = new DateTime();

$vehicle_images = new Vehicle_Images();

// Database Connect
$connection = $database->connect();

if (isset($_POST['submit'])) {

    for($x = 0; $x < count($_FILES['image']['name']); $x++){

		$name = $_FILES['image']['name'][$x];
		$size = $_FILES['image']['size'][$x];
		$type = $_FILES['image']['type'][$x];
        $tmp_name = $_FILES['image']['tmp_name'][$x];

        $maxSize = 1024 * 200;
        $accepted = array("png", "jpeg", "jpg", "giff");

        $location = PUBLIC_PATH . DS .'storage'.DS.'vehicles'.DS;

        if(!in_array(pathinfo($name, PATHINFO_EXTENSION), $accepted)){
            echo $name.' is NOT acceptable file type';
        }else{

            move_uploaded_file($tmp_name, $location.$name);
            
            echo 'file  uploaded successfully';
        }
    }

}
