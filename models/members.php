<?php

require_once(INIT_PATH . DS . 'initialization.php');

class Members
{

    private $conn;
    private $table_name = "members";

    // table properties
    public $id;
    public $role_id;
    public $fullnames;
    public $image;
    public $phone;
    public $email;
    public $dob;
    public $gender;
    public $location;
    public $status;
    public $username;
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
            $query .= "role_id, fullnames, image, phone, email, ";
            $query .= "dob, gender, location, status, ";
            $query .= "username, password, confirm_password, forgot_code, ";
            $query .= "created_date, edited_date";
            $query .= ")VALUES(";
            $query .= ":role_id, :fullnames, :image, :phone, :email, ";
            $query .= ":dob, :gender, :location, :status, ";
            $query .= ":username, :password, :confirm_password, :forgot_code, ";
            $query .= ":created_date, :edited_date";
            $query .= ")";
        }

        // prepare query 
        $stmt = $this->conn->prepare($query);

        // clean up data
        if (!empty($this->id)) {
            $this->id = htmlentities($this->id);
        }
        $this->role_id = htmlentities($this->role_id);
        $this->fullnames = htmlentities($this->fullnames);
        $this->image = htmlentities($this->image);
        $this->phone = htmlentities($this->phone);
        $this->email = htmlentities($this->email);
        $this->dob = htmlentities($this->dob);
        $this->gender = htmlentities($this->gender);
        $this->location = htmlentities($this->location);
        $this->status = htmlentities($this->status);
        $this->username = htmlentities($this->username);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->confirm_password = password_hash($this->confirm_password, PASSWORD_DEFAULT);
        $this->forgot_code = htmlentities($this->forgot_code);
        $this->created_date = htmlentities($this->created_date);
        $this->edited_date = htmlentities($this->edited_date);

        // bind parameters
        if (!empty($this->id)) {
            $stmt->bindParam(':id', $this->id);
        }
        $stmt->bindParam(':role_id', $this->role_id);
        $stmt->bindParam(':fullnames', $this->fullnames);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':dob', $this->dob);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':username', $this->username);
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
            $query .= "role_id = :role_id, fullnames = :fullnames, image = :image, phone = :phone, email = :email, ";
            $query .= "dob = :dob, gender = :gender, location = :location, status = :status, ";
            $query .= "username = :username, forgot_code = :forgot_code, ";
            $query .= "created_date = :created_date, edited_date = :edited_date ";
            $query .= "WHERE id = :id";
        }

        // prepare query 
        $stmt = $this->conn->prepare($query);

        // clean up data
        if (!empty($this->id)) {
            $this->id = htmlentities($this->id);
        }
        $this->role_id = htmlentities($this->role_id);
        $this->fullnames = htmlentities($this->fullnames);
        $this->image = htmlentities($this->image);
        $this->phone = htmlentities($this->phone);
        $this->email = htmlentities($this->email);
        $this->dob = htmlentities($this->dob);
        $this->gender = htmlentities($this->gender);
        $this->location = htmlentities($this->location);
        $this->status = htmlentities($this->status);
        $this->username = htmlentities($this->username);
        $this->forgot_code = htmlentities($this->forgot_code);
        $this->created_date = htmlentities($this->created_date);
        $this->edited_date = htmlentities($this->edited_date);

        // bind parameters
        if (!empty($this->id)) {
            $stmt->bindParam(':id', $this->id);
        }
        $stmt->bindParam(':role_id', $this->role_id);
        $stmt->bindParam(':fullnames', $this->fullnames);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':dob', $this->dob);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':username', $this->username);
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

    protected $upload_dir = "users";

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
            $this->image = basename(time() . $file['name']);
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
        if (empty($this->image) || empty($this->temp_path)) {
            $this->errors[] = "The file location was not available.";
            return false;
        }

        // 3. Determine the target_path
        $target_path = PUBLIC_PATH . DS . 'storage' . DS . $this->upload_dir . DS . $this->image;

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
        $member = $this->find_by_id($id);
        if ($member) {
            // find password
            if (password_verify($password, $member['password'])) {
                return $member;
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
            $member_object = array();
            $count = $stmt->rowCount();
            if ($count > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $member_object[] = $row;
                }
            }
            return $member_object;
        }
    }

    // find by status 
    public function find_all_by_status($status = '')
    {
        $query = "SELECT * FROM " . $this->table_name . " ";
        $query .= "WHERE status = :status ";
        $query .= "ORDER BY id DESC";

        // prepare statement
        $stmt = $this->conn->prepare($query);

        // execute statemrent 
        if ($stmt->execute(array('status'=>$status))) {
            // fetch data
            $member_object = array();
            $count = $stmt->rowCount();
            if ($count > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $member_object[] = $row;
                }
            }
            return $member_object;
        }
    }

    // find by status and limit
    public function find_all_by_status_with_limit($status = '', $limit = 0)
    {
        $query = "SELECT * FROM " . $this->table_name . " ";
        $query .= "WHERE status = :status ";
        $query .= "ORDER BY id DESC ";
        $query .= "LIMIT ".$limit;

        // prepare statement
        $stmt = $this->conn->prepare($query);

        // execute statemrent 
        if ($stmt->execute(array('status'=>$status))) {
            // fetch data
            $member_object = array();
            $count = $stmt->rowCount();
            if ($count > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $member_object[] = $row;
                }
            }
            return $member_object;
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

    public function find_by_email($email = "")
    {
        $query = "SELECT * FROM " . $this->table_name . " ";
        $query .= "WHERE email = :email LIMIT 1";

        //Prepare statement 
        $stmt = $this->conn->prepare($query);

        // Execute query
        if ($stmt->execute(array('email' => $email))) {
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

    public function authenticate($email = "", $password = "")
    {
        // find admin by email
        $member = $this->find_by_email($email);
        if ($member) {
            // check password
            if (password_verify($password, $member['password'])) {
                return $member;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}