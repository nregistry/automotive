<?php 

require_once(INIT_PATH . DS . 'initialization.php');

class Vehicle_Images_Migration
{

    private $conn;

    // table name and schema 
    private $table_name = "vehicle_images";

    // connect to db
    public function __construct()
    {
        global $database;
        $this->conn = $database->connect();
    }

    // create table
    public function create()
    {
        $query = "CREATE TABLE IF NOT EXISTS " . $this->table_name . "(";
        $query .= "id INT(11) UNSIGNED  NOT NULL PRIMARY KEY AUTO_INCREMENT, ";
        $query .= "vehicle_id INT(11) NOT NULL, ";
        $query .= "image VARCHAR(200) NOT NULL, ";
        $query .= "timestamp TIMESTAMP NULL DEFAULT NULL";
        $query .= ")";

        // execute query 
        $this->conn->exec($query);
        return true;
    }

    // read columns 
    public function find_columns()
    {
        $stmt = $this->conn->query("DESCRIBE ".$this->table_name);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    // drop table 
    public function drop()
    {
        $query = "DROP TABLE " . $this->table_name;

        $this->conn->exec($query);
        return true;
    }
}