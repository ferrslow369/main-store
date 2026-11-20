<?php
    /*Use this URL to print data in browser
    http://127.0.0.1/main-store/src/list_users.php
    */

include('../settings/database.php');

//Get data
    $user_id = $_GET['userID'];
    $user_status = $_GET['userStatus'];
 
//Prepare query
if  ($user_status == 'Active'){
    $new_userStatus = 'false';
} else {
    $new_userStatus = 'true';
}

$sql_update_user_status = "UPDATE users SET status = $new_userStatus WHERE id = $user_id";
$res = pg_query($local_conn, $sql_update_user_status);
 
if($res){
    echo "<script>alert('User status has been updated successfully !!!')</script>";
    header('refresh:0;url=list_users.php');
}else{
    echo "<script>alert('User status has not been updated successfully !!!')</script>";
    //header('refresh:0;url=list_users.php');
}