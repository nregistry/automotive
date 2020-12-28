<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = array();

$d = new DateTime();

require_once('../../init/initialization.php');

$members = new Members();

if($_POST["action"] == "FETCH_NUM_MEMBERS"){
    $status =  "ACTIVE";
    $all_members = $members->find_all_by_status($status);
    $data['total'] = count($all_members);
    echo json_encode($data);
}

if($_POST["action"] == "FETCH_MEMBER"){
    $memeber_id =  htmlentities($_POST['member_id']);
    $current_member = $members->find_by_id($memeber_id);
    if(!$current_member){
        $data['message'] = 'errorMember';
        echo json_encode($data);
    }
    echo json_encode($current_member);
}

if($_POST['action'] == "LOGOUT"){
    if($session->is_logged_in()){
        if ($session->user_type == "USER") {
            $session->logout();
            $data['message'] = "success";
        } else {
            $session->logout();
            $data['message'] = "success";
        }
    }else{
        $session->logout();
        $data['message'] = "success";
    }

    echo json_encode($data);
}

if($_POST['action'] == "FETCH_LOGGED_IN_USER"){
    if($session->is_logged_in()){
        if($session->check_user()){
            if($session->user_type == "USER"){
                $member_id = htmlentities($session->user_id);
                $current_member = $members->find_by_id($member_id);
                if($current_member){
                    echo json_encode($current_member);
                }
            }else{
                $session->logout();
                $data['message'] = "logout";
                echo json_encode($data);
            }
        }else{
            $session->logout();
            $data['message'] = "logout";
            echo json_encode($data);
        }
    }else{
        $session->logout();
        $data['message'] = "logout";
        echo json_encode($data);
    }
}