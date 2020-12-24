<?php
class Session
{

    /**
     * is admin will work with the 
     * 
     * super admins
     * 
     * will have two users
     * USERS ADMINS
     * @param
     */

    private $logged_in = false;
    private $is_admin = false;
    private $is_user = false;
    public $user_id;
    public $user_type;
    public $admin_id;

    // paypal transactions
    public $paypal_hash;

    function __construct()
    {
        session_start();
        $this->check_login();
        if ($this->logged_in) {
            //action to take right away if user is loggedin
            return true;
        } else {
            //action to take right away if user is not loggedin
            return false;
        }
    }

    private function check_login()
    {

        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->user_type = $_SESSION['user_type'];
            $this->logged_in = true;
            // set user 
            $this->is_user = true;
            // remove admin 
            $this->is_admin = false;
            // paypal transactions 
            //$this->paypal_hash = $_SESSION['paypal_hash'];
        } elseif (isset($_SESSION['admin_id'])) {
            $this->admin_id = $_SESSION['admin_id'];
            $this->logged_in = true;
            //set admin 
            $this->is_admin = true;
            //remove user
            $this->is_user = false;
            // paypal transactions 
            $this->paypal_hash = $_SESSION['paypal_hash'];
        } else {
            unset($this->user_id);
            unset($this->admin_id);
            unset($this->paypal_hash);
            $this->logged_in = false;
            $this->is_admin = false;
            $this->is_user = false;
        }
    }

    public function is_logged_in()
    {
        return $this->logged_in;
    }

    public function check_admin()
    {
        return $this->is_admin;
    }

    public function check_user()
    {
        return $this->is_user;
    }

    public function login($user, $type)
    {
        //database should based fon username/password
        if ($user) {
            // unset admin 
            unset($_SESSION['admin_id']);
            unset($this->admin_id);
            $this->is_admin = false;
            // set user id 
            $this->user_id = $_SESSION['user_id'] = $user['id'];
            $this->user_type = $_SESSION['user_type'] = $type;
            $this->logged_in = true;
            $this->is_user = true;
        }
    }

    // set paypal hash 
    public function set_paypal($hash = "")
    {
        $this->paypal_hash = $_SESSION['paypal_hash'] = $hash;
    }

    // admin login
    public function admin_login($admin)
    {
        if ($admin) {
            // unset sesion user id
            unset($_SESSION['user_id']);
            unset($this->user_id);
            $this->is_user = false;
            // set admin id
            $this->admin_id = $_SESSION['admin_id'] = $admin['id'];
            $this->logged_in = true;
            $this->is_admin = true;
        }
    }

    // logout
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_type']);
        unset($_SESSION['admin_id']);
        unset($this->user_id);
        unset($this->user_type);
        unset($this->admin_id);
        unset($this->paypal_hash);
        $this->logged_in = false;
        $this->is_admin = false;
        $this->is_user = false;
        session_destroy();
    }
}

$session = new Session();
