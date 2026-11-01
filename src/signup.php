<?php
//Get data from fronted
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $ide_number = $_POST['idnumber'];
    $mobile_phone = $_POST['mphone'];
    $email = $_POST['email'];
    $password = MD5($_POST['pswd']);
     
    echo "<br>" . $first_name;
    echo "<br>" . $last_name;
    echo "<br>" . $ide_number;
    echo "<br>" . $mobile_phone;
    echo "<br>" . $email;
    echo "<br>" . $password;
