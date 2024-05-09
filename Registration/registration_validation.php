<?php
    include '../Other/sql_connection.php';
    include '../Functions/existsInTableColumn.php';
    include '../Functions/insertIntoTable.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name_first =$_POST["name_first"];
    $name_last = $_POST["name_last"];
    $dob = $_POST["dob"];
    $phone = $_POST["phone"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $graduation = $_POST["graduation"];

    $errors = '';

    if (strlen($phone) != 12){
        $errors = $errors . 'please use phone number format "XXX-XXX-XXXX, ';
    }

    if(strlen((string)$graduation) != 4){
        $errors = $errors . 'please use form XXXX for graduation year, ';
    }

    if(existsInTableColumn($conn, 'user_details', 'id_username', $username)){
        $errors = $errors . 'username already in use, ';
    }
    
    if (!($errors == '')){
        $errors = substr($errors, 0, -2) . '.';
        echo $errors;
        exit;
    }

    insertIntoTable($conn,'user_details', $username,$password, $name_first,
    $name_last, $dob, $phone, $city, $state, $graduation);

    echo 'Account successfully created.';
?>