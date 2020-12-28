<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initialize
require_once('../../init/initialization.php');

// Database Connect
$connection = $database->connect();

$members = new Members();

$member_id = htmlentities($session->user_id);

$current_member = $members->find_by_id($member_id);

$status = $_POST['status'];

$vehicles = new Vehicles();

$member_vehicles = $vehicles->find_all_by_member_id_and_status($current_member["id"], $status);

$num_vehicles = count($member_vehicles);

// start on the query
$query = '';

// output array
$output = array();

$query .= "SELECT * FROM vehicles ";
$query .= "WHERE member_id = '{$current_member['id']}' AND status = '{$status}' ";

// Bring  in search query
if (isset($_POST["search"]["value"])) {
    $query .= "AND (";
    $query .= "vin_number LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR production_date LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR year LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR model LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR engine LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR trans LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= ") ";
}

// order query
if (isset($_POST["order"])) {
    $query .= "ORDER BY " . $_POST['order']['0']['column'] . " " . $_POST['order']['0']['dir'] . " ";
} else {
    $query .= "ORDER BY id DESC ";
}

// Pagging
if ($_POST["length"] != -1) {
    $query .= "LIMIT " . intval($_POST["length"]) . " OFFSET " . intval($_POST["start"]);
}

$statement = $connection->prepare($query);
$statement->execute();
$filtered_rows = $statement->rowCount();

// data array
$data = array();

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $sub_array = array();
    $sub_array[] = '<img src="' . public_url() . 'storage/vehicles/' . htmlentities($row["profile"]) . '" alt="Product 1" class="img-circle img-size-32 mr-2">';
    $sub_array[] = $row["vin_number"];
    $sub_array[] = $row["production_date"];
    $sub_array[] = $row["year"];
    $sub_array[] = $row["model"];
    $sub_array[] = $row["engine"];
    $sub_array[] = $row["trans"];
    $sub_array[] = '<button id="' . htmlentities($row["id"]) . '" class="text-muted btn btn-info view"> <i class="fa fa-eye"></i></button>';
    $data[] = $sub_array;
}

// store results in output array
$output = array(
    "draw"                =>    intval($_POST["draw"]),
    "recordsTotal"        =>     $filtered_rows,
    "recordsFiltered"    =>    $num_vehicles,
    "data"                =>    $data
);

echo json_encode($output);
