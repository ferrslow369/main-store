<?php
//get database  connection
require('../settings/database.php');

//Get paylod from fronted
$email = $_POST['email'];
$password = MD5($_POST['pswd']);

$sql_check_email = "SELECT * FROM users WHERE email = '$email' and password = '$passwd' ";
$res = pg_query($local_conn, $sql_check_email);
$total = pg_num_rows($res);

if ($total > 0) {
    header('refresh:0;url=home.php');
}else{
    echo"<script>alert('Invalid email or password. Try again !!!')</script>";
    header('refresh:0;url=signin.html');
}
//Aqui validar contra