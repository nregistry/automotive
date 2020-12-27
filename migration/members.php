<?php 

require_once(INIT_PATH . DS . 'initialization.php');

class Members_Migration
{

    private $conn;

    // table name and schema 
    private $table_name = "members";

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
        $query .= "fullnames VARCHAR(100) NOT NULL, ";
        $query .= "image VARCHAR(200) NOT NULL, ";
        $query .= "phone VARCHAR(200) NOT NULL, ";
        $query .= "email VARCHAR(200) NOT NULL, ";
        $query .= "dob DATE NOT NULL, ";
        $query .= "gender VARCHAR(200) NOT NULL, ";
        $query .= "location VARCHAR(200) NOT NULL, ";
        $query .= "status VARCHAR(200) NOT NULL, ";
        $query .= "username VARCHAR(200) NOT NULL, ";
        $query .= "password VARCHAR(200) NOT NULL, ";
        $query .= "confirm_password VARCHAR(200) NOT NULL, ";
        $query .= "forgot_code VARCHAR(200) NOT NULL, ";
        $query .= "created_date TIMESTAMP NULL DEFAULT NULL, ";
        $query .= "edited_date TIMESTAMP NULL DEFAULT NULL";
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