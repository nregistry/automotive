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

// check if there are any files submitted
if (count($_FILES["file"]["name"]) > 0) {
    for ($count = 0; $count < count($_FILES["file"]["name"]); $count++) {
        $file_name = $_FILES["file"]["name"][$count];
        $tmp_name = $_FILES["file"]['tmp_name'][$count];
        $file_array = explode(".", $file_name);
        $file_extension = end($file_array);
        if (file_already_uploaded($file_name, $connection)) {
            $file_name = $file_array[0] . '-' . rand() . '.' . $file_extension;
        }
        $location = PUBLIC_PATH . DS .'storage'.DS.'vehicles'.DS.$file_name;
        $vehicle_id = $_POST['vehicle_id'];
        if (move_uploaded_file($tmp_name, $location)) {
            // insert into db
            $query = "INSERT INTO vehicle_images (";
            $query .= "vehicle_id, image, title, timestamp";
            $query .= ") VALUES (";
            $query .= "'{$vehicle_id}', '{$file_name}', '', '{$d->format("Y-m-d H:i:s")}'";
            $query .= ")";
            $statement = $connection->prepare($query);
            $statement->execute();
            echo 'success';
            die();
        }
    }
}

function file_already_uploaded($file_name, $connect)
{

    $query = "SELECT * FROM vehicle_images WHERE image = '" . $file_name . "'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $number_of_rows = $statement->rowCount();
    if ($number_of_rows > 0) {
        return true;
    } else {
        return false;
    }
}