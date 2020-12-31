<?php

require_once(INIT_PATH . DS . 'initialization.php');

class Admins
{

    private $conn;
    private $table_name = "admins";

    // table properties
    public $id;
    public $admin_fullnames;
    public $admin_image;
    public $admin_phone;
    public $admin_email;
    public $admin_dob;
    public $admin_gender;
    public $admin_status;
    public $admin_location;
    public $admin_username;
    public $password;
    public $confirm_password;
    public $forgot_code;
    public $created_date;
    public $edited_date;

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
            $query .= "admin_fullnames, admin_image , admin_phone, admin_email, ";
            $query .= "admin_dob, admin_gender, admin_status, admin_location, ";
            $query .= "admin_username, password, confirm_password, forgot_code, ";
            $query .= "created_date, edited_date";
            $query .= ")VALUES(";
            $query .= ":admin_fullnames, :admin_image , :admin_phone, :admin_email, ";
            $query .= ":admin_dob, :admin_gender, :admin_status, :admin_location, ";
            $query .= ":admin_username, :password, :confirm_password, :forgot_code, ";
            $query .= ":created_date, :edited_date";
            $query .= ")";
        }

        // prepare query 
        $stmt = $this->conn->prepare($query);

        // clean up data
        if (!empty($this->id)) {
            $this->id = htmlentities($this->id);
        }
        $this->admin_fullnames = htmlentities($this->admin_fullnames);
        $this->admin_image = htmlentities($this->admin_image);
        $this->admin_phone = htmlentities($this->admin_phone);
        $this->admin_email = htmlentities($this->admin_email);
        $this->admin_dob = htmlentities($this->admin_dob);
        $this->admin_gender = htmlentities($this->admin_gender);
        $this->admin_status = htmlentities($this->admin_status);
        $this->admin_location = htmlentities($this->admin_location);
        $this->admin_username = htmlentities($this->admin_username);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->confirm_password = password_hash($this->confirm_password, PASSWORD_DEFAULT);
        $this->forgot_code = htmlentities($this->forgot_code);
        $this->created_date = htmlentities($this->created_date);
        $this->edited_date = htmlentities($this->edited_date);

        // bind parameters
        if (!empty($this->id)) {
            $stmt->bindParam(':id', $this->id);
        }
        $stmt->bindParam(':admin_fullnames', $this->admin_fullnames);
        $stmt->bindParam(':admin_image', $this->admin_image);
        $stmt->bindParam(':admin_phone', $this->admin_phone);
        $stmt->bindParam(':admin_email', $this->admin_email);
        $stmt->bindParam(':admin_dob', $this->admin_dob);
        $stmt->bindParam(':admin_gender', $this->admin_gender);
        $stmt->bindParam(':admin_status', $this->admin_status);
        $stmt->bindParam(':admin_location', $this->admin_location);
        $stmt->bindParam(':admin_username', $this->admin_username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':confirm_password', $this->confirm_password);
        $stmt->bindParam(':forgot_code', $this->forgot_code);
        $stmt->bindParam(':created_date', $this->created_date);
        $stmt->bindParam(':edited_date', $this->edited_date);

        // execute query 
        if ($stmt->execute()) {
            if (empty($this->id)) {
                $this->id = $this->conn->lastInsertId();
            }
            return true;
        }
    }

    // update admin
    public function update()
    {
        $query = "";
        if (!empty($this->id)) {
            $query .= "UPDATE " . $this->table_name . " SET ";
            $query .= "admin_fullnames = :admin_fullnames, admin_image = :admin_image , admin_phone = :admin_phone, admin_email = :admin_email, ";
            $query .= "admin_dob = :admin_dob, admin_gender = :admin_gender, admin_status = :admin_status, ";
            $query .= "admin_location = :admin_location, admin_username = :admin_username, forgot_code = :forgot_code, ";
            $query .= "created_date = :created_date, edited_date = :edited_date ";
            $query .= "WHERE id = :id";
        }

        // prepare query 
        $stmt = $this->conn->prepare($query);

        // clean up data
        if (!empty($this->id)) {
            $this->id = htmlentities($this->id);
        }
        $this->admin_fullnames = htmlentities($this->admin_fullnames);
        $this->admin_image = htmlentities($this->admin_image);
        $this->admin_phone = htmlentities($this->admin_phone);
        $this->admin_email = htmlentities($this->admin_email);
        $this->admin_dob = htmlentities($this->admin_dob);
        $this->admin_gender = htmlentities($this->admin_gender);
        $this->admin_status = htmlentities($this->admin_status);
        $this->admin_location = htmlentities($this->admin_location);
        $this->admin_username = htmlentities($this->admin_username);
        $this->forgot_code = htmlentities($this->forgot_code);
        $this->created_date = htmlentities($this->created_date);
        $this->edited_date = htmlentities($this->edited_date);

        // bind parameters
        if (!empty($this->id)) {
            $stmt->bindParam(':id', $this->id);
        }
        $stmt->bindParam(':admin_fullnames', $this->admin_fullnames);
        $stmt->bindParam(':admin_image', $this->admin_image);
        $stmt->bindParam(':admin_phone', $this->admin_phone);
        $stmt->bindParam(':admin_email', $this->admin_email);
        $stmt->bindParam(':admin_dob', $this->admin_dob);
        $stmt->bindParam(':admin_gender', $this->admin_gender);
        $stmt->bindParam(':admin_status', $this->admin_status);
        $stmt->bindParam(':admin_location', $this->admin_location);
        $stmt->bindParam(':admin_username', $this->admin_username);
        $stmt->bindParam(':forgot_code', $this->forgot_code);
        $stmt->bindParam(':created_date', $this->created_date);
        $stmt->bindParam(':edited_date', $this->edited_date);

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

    protected $upload_dir = "admin";

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
            $this->admin_image = basename(time() . $file['name']);
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
        if (empty($this->admin_image) || empty($this->temp_path)) {
            $this->errors[] = "The file location was not available.";
            return false;
        }

        // 3. Determine the target_path
        $target_path = PUBLIC_PATH . DS . 'storage' . DS . $this->upload_dir . DS . $this->admin_image;

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
                if ($this->update()) {
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

    // change password
    public function find_by_password($id = 0, $password = "")
    {
        $tenant = $this->find_by_id($id);
        if ($tenant) {
            // find password
            if (password_verify($password, $tenant['password'])) {
                return $tenant;
            }
        } else {
            return false;
        }
    }

    // update customer password
    public function update_password()
    {
        $query = "";
        if (!empty($this->id)) {
            $query .= "UPDATE " . $this->table_name . " SET ";
            $query .= "password = :password, confirm_password = :confirm_password, ";
            $query .= "edited_date = :edited_date ";
            $query .= "WHERE id=:id";
        }

        $stmt = $this->conn->prepare($query);

        if (!empty($this->id)) {
            $this->id = htmlentities($this->id);
        }
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->confirm_password = password_hash($this->confirm_password, PASSWORD_DEFAULT);
        $this->edited_date = htmlentities($this->edited_date);

        // bind statement
        if (!empty($this->id)) {
            $stmt->bindParam(':id', $this->id);
        }
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':confirm_password', $this->confirm_password);
        $stmt->bindParam(':edited_date', $this->edited_date);

        // execute
        if ($stmt->execute()) {
            return true;
        } else {
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
            $admin_object = array();
            $count = $stmt->rowCount();
            if ($count > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $admin_object[] = $row;
                }
            }
            return $admin_object;
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
            $tenant = $stmt->fetch(PDO::FETCH_ASSOC);
            // Set properties
            return $tenant;
        } else {
            return false;
        }
    }

    public function find_by_email($admin_email = "")
    {
        $query = "SELECT * FROM " . $this->table_name . " ";
        $query .= "WHERE admin_email = :admin_email LIMIT 1";

        //Prepare statement 
        $stmt = $this->conn->prepare($query);

        // Execute query
        if ($stmt->execute(array('admin_email' => $admin_email))) {
            $tenant = $stmt->fetch(PDO::FETCH_ASSOC);
            // Set properties
            return $tenant;
        } else {
            return false;
        }
    }

    public function find_by_forgot_code($forgot_code = 0)
    {
        $query = "SELECT * FROM " . $this->table_name . " ";
        $query .= "WHERE forgot_code = :forgot_code LIMIT 1";

        //Prepare statement 
        $stmt = $this->conn->prepare($query);

        // Execute query
        if ($stmt->execute(array('forgot_code' => $forgot_code))) {
            $tenant = $stmt->fetch(PDO::FETCH_ASSOC);
            // Set properties
            return $tenant;
        } else {
            return false;
        }
    }

    public function find_by_status($admin_status = 0)
    {
        $query = "SELECT * FROM " . $this->table_name . " ";
        $query .= "WHERE admin_status = :admin_status LIMIT 1";

        //Prepare statement 
        $stmt = $this->conn->prepare($query);

        // clean data 
        $admin_status = htmlentities($admin_status);

        // Execute query
        if ($stmt->execute(array('admin_status' => $admin_status))) {
            $tenant = $stmt->fetch(PDO::FETCH_ASSOC);
            // Set properties
            return $tenant;
        } else {
            return false;
        }
    }

    public function authenticate($admin_email = "", $password = "")
    {
        // find admin by email
        $admin = $this->find_by_email($admin_email);
        if ($admin) {
            // check password
            if (password_verify($password, $admin['password'])) {
                return $admin;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}