<?php
include_once 'config.php';
if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action == 'get_posts'){
        $json = array();
        $sql = "SELECT * FROM post";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            $json[] = $row;
        }
        echo json_encode($json,true);
        return;
    }

    if($action == 'get_accounts'){
        $sql = "SELECT * FROM accountfb";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
            $json[] = $row;
        }
        echo json_encode($json,true); 
        return;
    }
}
$_POST = json_decode(file_get_contents('php://input'), true);
if(isset($_POST['action'])){
    $action = $_POST['action'];
    if($action == 'add_post') {
        $post_id = $_POST['post_id'];
        $sql = "INSERT INTO post (postid,invite_status,total_invite,update_time) VALUES ( '$post_id', 'ACTIVE', '0', CURRENT_TIMESTAMP)";
        mysqli_query($conn,$sql);
        $result = [
            "postid" => $post_id,
            "invite_status" => 'ACTIVE',
            "total_invite" => 0,
            "update_time" => date("Y-m-d H:i:s"),            
        ];
        echo json_encode($result,true);
    }
    if($action == 'add_acc'){
        $cookie = $_POST['cookie'];
        preg_match('/c_user=([0-9?]+)/',$cookie,$mathes);
        $sql = "INSERT INTO accountfb (acc_id,cookie) VALUES ( '$mathes[1]', '$cookie')";
        mysqli_query($conn,$sql); 

    }

    if($action == 'del_post'){
        $post_id = $_POST['post_id'];
        $sql = "DELETE FROM post WHERE postid='$post_id'";
        mysqli_query($conn,$sql); 
    }
    if($action == 'del_acc'){
        $post_id = $_POST['acc_id'];
        $sql = "DELETE FROM accountfb WHERE acc_id='$acc_id'";
        mysqli_query($conn,$sql); 
    }
}
?>
