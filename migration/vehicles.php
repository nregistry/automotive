<?php 

require_once(INIT_PATH . DS . 'initialization.php');

class Vehicles_Migration
{

    private $conn;

    // table name and schema 
    private $table_name = "vehicles";

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
        $query .= "member_id INT(11) NOT NULL, ";
        $query .= "vin_number VARCHAR(100) NOT NULL, ";
        $query .= "profile VARCHAR(200) NOT NULL, ";
        $query .= "production_date DATE NOT NULL, ";
        $query .= "year VARCHAR(200) NOT NULL, ";
        $query .= "model VARCHAR(200) NOT NULL, ";
        $query .= "engine VARCHAR(200) NOT NULL, ";
        $query .= "trans VARCHAR(200) NOT NULL, ";
        $query .= "status VARCHAR(200) NOT NULL, ";
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