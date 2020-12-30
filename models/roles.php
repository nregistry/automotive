<?php

require_once(INIT_PATH . DS . 'initialization.php');

class Roles
{

    private $conn;
    private $table_name = "roles";

    // table properties
    public $id;
    public $role_name;
    public $timestamp;
    
    // connect to db
    public function __construct()
    {
        global $database;
        $this->conn = $database->connect();
    }


    // create new tenant
    public function save()
    {
        $query = "";
        if (empty($this->id)) {
            $query .= "INSERT INTO " . $this->table_name . "(";
            $query .= "role_name, timestamp";
            $query .= ")VALUES(";
            $query .= ":role_name, :timestamp";
            $query .= ")";
        }else{
            $query .= "UPDATE " . $this->table_name . " SET ";
            $query .= "role_name = :role_name, timestamp = :timestamp ";
            $query .= "WHERE id = :id";
        }

        // prepare query 
        $stmt = $this->conn->prepare($query);

        // clean up data
        if (!empty($this->id)) {
            $this->id = htmlentities($this->id);
        }
        $this->role_name = htmlentities($this->role_name);
        $this->timestamp = htmlentities($this->timestamp);

        // bind parameters
        if (!empty($this->id)) {
            $stmt->bindParam(':id', $this->id);
        }
        $stmt->bindParam(':role_name', $this->role_name);
        $stmt->bindParam(':timestamp', $this->timestamp);

        // execute query 
        if ($stmt->execute()) {
            if (empty($this->id)) {
                $this->id = $this->conn->lastInsertId();
            }
            return true;
        }
    }

    // delete
    public function delete($id = 0)
    {
        $query = "DELETE FROM " . $this->table_name . " ";
        $query .= "WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        // clean up id
        $this->id = htmlentities($this->id);

        // execute
        if ($stmt->execute(array('id' => $id))) {
            return true;
        }
    }

    public function find_all()
    {
        $query = "SELECT * FROM " . $this->table_name . " ";
        $query .= "ORDER BY id DESC";

        // prepare statement
        $stmt = $this->conn->prepare($query);

        // execute statemrent 
        if ($stmt->execute()) {
            // fetch data
            $vehicle_object = array();
            $count = $stmt->rowCount();
            if ($count > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $vehicle_object[] = $row;
                }
            }
            return $vehicle_object;
        }
    }

    public function find_by_id($id = 0)
    {
        $query = "SELECT * FROM " . $this->table_name . " ";
        $query .= "WHERE id = :id LIMIT 1";

        //Prepare statement 
        $stmt = $this->conn->prepare($query);

        // Execute query
        if ($stmt->execute(array('id' => $id))) {
            $role = $stmt->fetch(PDO::FETCH_ASSOC);
            // Set properties
            return $role;
        } else {
            return false;
        }
    }

    public function find_by_role_name($role_name = 0)
    {
        $query = "SELECT * FROM " . $this->table_name . " ";
        $query .= "WHERE role_name = :role_name LIMIT 1";

        //Prepare statement 
        $stmt = $this->conn->prepare($query);

        // Execute query
        if ($stmt->execute(array('role_name' => $role_name))) {
            $role = $stmt->fetch(PDO::FETCH_ASSOC);
            // Set properties
            return $role;
        } else {
            return false;
        }
    }
}