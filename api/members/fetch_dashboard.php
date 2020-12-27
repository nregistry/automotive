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

$status = $_POST['status'];

$all_members = $members->find_all_by_status($status);

$num_members = count($all_members);

// start on the query
$query = '';

// output array
$output = array();

$query .= "SELECT * FROM members ";

$query .= "WHERE status = '{$status}' ";

// Bring  in search query
if (isset($_POST["search"]["value"])) {
    $query .= "AND (";
    $query .= "fullnames LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR phone LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR email LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= "OR location LIKE '%{$_POST["search"]["value"]}%' ";
    $query .= ") ";
}

// order query
if (isset($_POST["order"])) {
    $query .= "ORDER BY " . $_POST['order']['0']['column'] . " " . $_POST['order']['0']['dir'] . " ";
} else {
    $query .= "ORDER BY id DESC ";
}

// Pagging
if($_POST["length"] != -1){
	$query .= "LIMIT ".intval($_POST["length"])." OFFSET ".intval($_POST["start"]);
}

$statement = $connection->prepare($query);
$statement->execute();
$filtered_rows = $statement->rowCount();

// data array
$data = array();

while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $sub_array = array();
    $sub_array[] = '<img src="'.public_url().'storage/users/'.$row["image"].'" alt="Product 1" class="img-circle img-size-32 mr-2">';
    $sub_array[] = $row["fullnames"];
    $sub_array[] = $row["phone"];
    $sub_array[] = $row["email"];
    $sub_array[] = $row["location"];
    $sub_array[] = '<button id="'.htmlentities($row["id"]).'" class="text-muted btn btn-info view"> <i class="fa fa-search"></i></button>';
    $data[] = $sub_array;
}

// store results in output array
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	$num_members,
	"data"				=>	$data
);

echo json_encode($output);