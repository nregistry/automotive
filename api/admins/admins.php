<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once('../../init/initialization.php');

$data = array();

$d = new DateTime();

$admin = new Admins();

if ($_POST['action'] == "LOGOUT") {
    if ($session->is_logged_in()) {
        if ($session->check_user()) {
            if ($session->user_type == "ADMIN") {
                $admin_id = htmlentities($session->user_id);
                $current_admin = $admin->find_by_id($admin_id);
                if (!$current_admin) {
                    $session->logout();
                    $data['message'] = "success";
                    echo json_encode($data);
                    die();
                }
                $session->logout();
                $data['message'] = "success";
            } else {
                $session->logout();
                $data['message'] = "success";
            }
        } else {
            $session->logout();
            $data['message'] = "success";
        }
    } else {
        $session->logout();
        $data['message'] = "success";
    }

    echo json_encode($data);
}

if ($_POST['action'] == "FETCH_LOGGED_IN_ADMIN") {
    if ($session->is_logged_in()) {
        if ($session->check_user()) {
            if ($session->user_type == "ADMIN") {
                $admin_id = htmlentities($session->user_id);
                $current_admin = $admin->find_by_id($admin_id);
                if ($current_admin) {
                    echo json_encode($current_admin);
                }
            } else {
                $session->logout();
                $data['message'] = "logout";
                echo json_encode($data);
            }
        } else {
            $session->logout();
            $data['message'] = "logout";
            echo json_encode($data);
        }
    } else {
        $session->logout();
        $data['message'] = "logout";
        echo json_encode($data);
    }
}