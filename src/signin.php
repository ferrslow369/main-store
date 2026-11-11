<?php
//get database  connection
include('../settings/database.php');

session_start();
if (!isset($_SESSION['user_id'])) {
    header('refresh:0;url=signin.html');
}else{
    header('refresh:0;url=home.php');
}

//Get paylod from fronted
$email = $_POST['email'];
$passwd = MD5($_POST['pswd']);

$sql_check_email = "
    SELECT 
        id,
        firstname,
        lastname,
        email
        url_photo
    FROM 
        users 
    WHERE 
        email = '$email' and 
        password = '$passwd' 
";
$res = pg_query($local_conn, $sql_check_email);
$total = pg_num_rows($res);
$row = pg_fetch_assoc($res);

if ($total > 0) {
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_firstname'] = $row['firstname'];
    $_SESSION['user_lastname'] = $row['laststname'];
    header('refresh:0;url=home.php');
}else{
    echo"<script>alert('Invalid email or password. Try again !!!')</script>";
    header('refresh:0;url=signin.html');
}
//Aqui validar contra