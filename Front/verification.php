<?php
    $servername = "localhost";
    $username = "lanny1";
    $password = "test123";
    $db = 'tracking';

    // $user_username = $_POST['user'];
    $user_username = $_POST['user'];
    $user_password = $_POST['password'];

    echo $user_password;
    echo $user_username;
    $conn = new mysqli($servername, $username, $password, $db);

    // $sql ="
    // SELECT 
    
    // ";

    // if ($conn->query($sql) === TRUE) {
    //     echo "Success";
    // } else {
    //     echo "Error" . $conn->error;
    // }
    header('Location: ../Events/events.php')
?>