<?php
    include '../Other/sql_connection.php';
    include '../Functions/existsInTableColumn.php';
    include '../Functions/insertIntoTable.php';
    include '../Functions/cleanStr.php';
    
    /*

        A better way to cycle through posts? I want to still have
        a variable attatched to each post so I can use it, but all
        the methods I have found cycle through?

    */
    $username = cleanStr($_POST["username"]);
    $password = trim($_POST["password"]);
    $name_first = cleanStr($_POST["name_first"]);
    $name_last = cleanStr($_POST["name_last"]);
    $dob = cleanStr($_POST["dob"]);
    $phone = cleanStr($_POST["phone"]);
    $city = cleanStr($_POST["city"]);
    $state = cleanStr($_POST["state"]);
    $graduation = cleanStr($_POST["graduation"]);

    if($username != $_POST["username"]){
        echo $username;
    }

    $phone = preg_replace("/[^0-9]/", '', $phone);

    if($username == "" || $name_first == "" || $name_last=="" || $dob=="" || $city=="" || $state==""){
        echo 'Please fill out all fields';
        exit;
    }

    if (strlen($phone) != 10){
        echo 'Please use phone number format "XXX-XXX-XXXX';
        exit;
    }

    if(strlen((string)$graduation) != 4){
        echo 'Please use format XXXX for graduation year';
        exit;
    }

    if(existsInTableColumn($conn, 'user_details', 'id_username', $username)){
        echo 'Username already in use';
        exit;
    }

    insertIntoTable($conn,'user_details', $username,$password, $name_first,
    $name_last, $dob, $phone, $city, $state, $graduation);

    echo 'Account successfully created.';
?>