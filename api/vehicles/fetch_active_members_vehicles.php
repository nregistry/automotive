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

$status = $_POST['status'];

$vehicles = new Vehicles();

$active_vehicles = $vehicles->find_all_by_status($status);

$num_vehicles = count($active_vehicles);

// start on the query
$query = '';

// output array
$output = array();

$query .= "SELECT ";
$query .= "fullnames, profile, vin_number, ";
$query .= "production_date, year, model, ";
$query .= "engine, trans, colors ";
$query .= "FROM vehicles ";
$query .= "INNER JOIN members ON vehicles.member_id = members.id ";
$query .= "WHERE vehicles.status = '{$status}' ";

// Bring  in search query
if (isset($_POST["search"]["value"])) {
    $query .= "AND (";
    $query .= "members.fullnames LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR vehicles.vin_number LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR vehicles.production_date LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR vehicles.year LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR vehicles.model LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR vehicles.engine LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR vehicles.trans LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= ") ";
}

// order query
if (isset($_POST["order"])) {
    $query .= "ORDER BY " . $_POST['order']['0']['column'] . " " . $_POST['order']['0']['dir'] . " ";
} else {
    $query .= "ORDER BY vehicles.id DESC ";
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
    $sub_array[] = $row["fullnames"];
    $sub_array[] = '<img src="' . public_url() . 'storage/vehicles/' . htmlentities($row["profile"]) . '" alt="Product 1" class="img-circle img-size-32 mr-2">';
    $sub_array[] = $row["vin_number"];
    $sub_array[] = $row["production_date"];
    $sub_array[] = $row["year"];
    $sub_array[] = $row["model"];
    $sub_array[] = $row["engine"];
    $sub_array[] = $row["trans"];
    $sub_array[] = $row["colors"];
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
