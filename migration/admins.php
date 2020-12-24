<?php 

require_once(INIT_PATH . DS . 'initialization.php');

class Admins_Migration
{

    private $conn;

    // table name and schema 
    private $table_name = "admins";

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
        $query .= "admin_fullnames VARCHAR(100) NOT NULL, ";
        $query .= "admin_image VARCHAR(200) NOT NULL, ";
        $query .= "admin_phone VARCHAR(200) NOT NULL, ";
        $query .= "admin_email VARCHAR(200) NOT NULL, ";
        $query .= "admin_dob DATE NOT NULL, ";
        $query .= "admin_gender VARCHAR(200) NOT NULL, ";
        $query .= "admin_location VARCHAR(200) NOT NULL, ";
        $query .= "admin_username VARCHAR(200) NOT NULL, ";
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