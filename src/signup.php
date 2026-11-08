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
    echo "User has been created successfully !!!";
}else{
    echo "Error. User hasn't been created successfully";
}
    
