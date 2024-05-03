<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include '../Functions/existsInTableColumn.php';
    $servername = "localhost";
    $username = "lanny1";
    $password = "test123";
    $db = 'tracking';
    $conn = new mysqli($servername, $username, $password, $db);
    
    $user_username = $_POST['user'];
    $user_expected_password = $_POST['password'];
    
    
    $used = existsInTableColumn($conn, 'UserDetails', 'Username', $user_username);

    if (!$used){
        header('Location: ../Other/error_page.php');
    }
    
    $sql = "
    SELECT 
        Password
    FROM
        UserDetails
    WHERE
        Username = '$user_username';";

    $result = mysqli_query($conn, $sql);
    $sql_array = $result->fetch_all();
    $password_checked = $sql_array[0][0];

    if (!($user_expected_password == $password_checked)){
        header('Location: ../Other/error_page.php');
    }
    else{
        header('Location: ../Events/events.php');
    }
?>