<?php

require_once(INIT_PATH . DS . 'initialization.php');

class Vehicles
{

    private $conn;
    private $table_name = "vehicles";

    // table properties
    public $id;
    public $member_id;
    public $vin_number;
    public $profile;
    public $production_date;
    public $year;
    public $model;
    public $engine;
    public $trans;
    public $status;
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
            $query .= "member_id, vin_number, profile, production_date, year, ";
            $query .= "model, engine, trans, status, timestamp";
            $query .= ")VALUES(";
            $query .= ":member_id, :vin_number, :profile, :production_date, :year, ";
            $query .= ":model, :engine, :trans, :status, :timestamp";
            $query .= ")";
        }else{
            $query .= "UPDATE " . $this->table_name . " SET ";
            $query .= "member_id = :member_id, vin_number = :vin_number, profile = :profile, production_date = :production_date, year = :year, ";
            $query .= "model = :model, engine = :engine, trans = :trans, status = :status, timestamp = :timestamp ";
            $query .= "WHERE id = :id";
        }

        // prepare query 
        $stmt = $this->conn->prepare($query);

        // clean up data
        if (!empty($this->id)) {
            $this->id = htmlentities($this->id);
        }
        $this->member_id = htmlentities($this->member_id);
        $this->vin_number = htmlentities($this->vin_number);
        $this->profile = htmlentities($this->profile);
        $this->production_date = htmlentities($this->production_date);
        $this->year = htmlentities($this->year);
        $this->model = htmlentities($this->model);
        $this->engine = htmlentities($this->engine);
        $this->trans = htmlentities($this->trans);
        $this->status = htmlentities($this->status);
        $this->timestamp = htmlentities($this->timestamp);

        // bind parameters
        if (!empty($this->id)) {
            $stmt->bindParam(':id', $this->id);
        }
        $stmt->bindParam(':member_id', $this->member_id);
        $stmt->bindParam(':vin_number', $this->vin_number);
        $stmt->bindParam(':profile', $this->profile);
        $stmt->bindParam(':production_date', $this->production_date);
        $stmt->bindParam(':year', $this->year);
        $stmt->bindParam(':model', $this->model);
        $stmt->bindParam(':engine', $this->engine);
        $stmt->bindParam(':trans', $this->trans);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':timestamp', $this->timestamp);

        // execute query 
        if ($stmt->execute()) {
            if (empty($this->id)) {
                $this->id = $this->conn->lastInsertId();
            }
            return true;
        }
    }

    // save with category image
    private $temp_path;

    protected $upload_dir = "vehicles";

    // store errors
    public $errors = array();

    //upload errors
    protected $upload_errors = array(
        //http://www.php.net/manual/en/features.file-upload.errors.php
        UPLOAD_ERR_OK => "No errors.",
        UPLOAD_ERR_INI_SIZE => "Large than upload_max_filesize",
        UPLOAD_ERR_FORM_SIZE => "Large than form max_size",
        UPLOAD_ERR_PARTIAL => "Partial upload",
        UPLOAD_ERR_NO_FILE => "No file",
        UPLOAD_ERR_NO_TMP_DIR => "No temporary directory",
        UPLOAD_ERR_CANT_WRITE => "Cant write to disk",
        UPLOAD_ERR_EXTENSION => "File upload stopped by extension. "
    );

    //attach file removing all errors
    public function attach_file($file)
    {
        /*
        * Perform error checking on the form parameters
        * set object attributes to form parameters
        * dont worry about saving anything to the database yet.
        */
        //perform error checking on the form parameters
        if (!$file || empty($file) || !is_array($file)) {
            //error: nothing uploaded or wrong argument usage
            $this->errors[] = "No file was uploaded. ";
            return false;
        } elseif ($file['error'] != 0) {
            // error: report what PHP says went wrong
            $this->errors[] = $this->upload_errors[$file['error']];
            return false;
        } else {
            // Set object attributes to the form parameters
            $this->temp_path = $file['tmp_name'];
            $this->profile = basename(time() . $file['name']);
            //Dont worry about the databaseyet
            return true;
        }
    }

    // save with image
    public function save_image()
    {
        /*
        * Make sure there are no errors
        * Attempt to move the file
        * Save corresponding entry to the database
        */
        // 1. make sure there are no errors
        if (!empty($this->errors)) {
            return false;
        }

        //2. cant see without filename and tempt location
        if (empty($this->profile) || empty($this->temp_path)) {
            $this->errors[] = "The file location was not available.";
            return false;
        }

        // 3. Determine the target_path
        $target_path = PUBLIC_PATH . DS . 'storage' . DS . $this->upload_dir . DS . $this->profile;

        // 4. make sure the file doesn't exist
        if (file_exists($target_path)) {
            return unlink($target_path) ? true : false;
        }

        // 5. Attempt to move the file
        if (move_uploaded_file($this->temp_path, $target_path)) {
            // save the file
            if (empty($this->id)) {
                if ($this->save()) {
                    return true;
                }
            } else {
                if ($this->save()) {
                    return true;
                }
            }
        } else {
            /*
                * File was not moved
                */
            $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the uploaded folder.";
            return false;
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
            $vehicle = $stmt->fetch(PDO::FETCH_ASSOC);
            // Set properties
            return $vehicle;
        } else {
            return false;
        }
    }

    public function find_all_by_member_id($member_id=0)
    {
        $query = "SELECT * FROM " . $this->table_name . " ";
        $query .= "WHERE member_id = :member_id ";
        $query .= "ORDER BY id DESC";

        // prepare statement
        $stmt = $this->conn->prepare($query);

        // clean up data
        $member_id = htmlentities($member_id);

        // execute statemrent 
        if ($stmt->execute(array('member_id' => $member_id))) {
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

    public function find_all_by_member_id_and_status($member_id=0, $status = '')
    {
        $query = "SELECT * FROM " . $this->table_name . " ";
        $query .= "WHERE member_id = :member_id AND status = :status ";
        $query .= "ORDER BY id DESC";

        // prepare statement
        $stmt = $this->conn->prepare($query);

        // clean up data
        $member_id = htmlentities($member_id);
        $status = htmlentities($status);

        // execute statemrent 
        if ($stmt->execute(array('member_id' => $member_id, 'status'=>$status))) {
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
}