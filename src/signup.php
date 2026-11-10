<?php
//get database  connection
require('../settings/database.php');
//Get paylod from fronted
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $ide_number = $_POST['idnumber'];
    $mobile_phone = $_POST['mphone'];
    $email = $_POST['email'];
    $password = MD5($_POST['pswd']);

$sql_check_email = "SELECT * FROM users WHERE email = '$email'";
$res = pg_query($local_conn, $sql_check_email);
$total = pg_num_rows($res);
if ($total<1) {

//prepare query

    $sql = "
        INSERT INTO 
        users (firstname, lastname, ident_number, email, password) 
        VALUES (
            '$first_name',
            '$last_name',
            '$ide_number',
            '$email',
            '$password'
            );
    ";
//Execute query    
$res = pg_query($local_conn, $sql);

    if ($res){
        //echo "<br>User has been created successfully !!!";
        echo"<script>alert('user has been created successfully!!!')</script>";
        header('refresh:0;url=signin.html');
    }else{
        echo "Error. User hasn't been created successfully";
    }
}else{
    echo"<script>alert('user email already exist. Try again !!!')</script>";
    header('refresh:0;url=signup.html');
}
