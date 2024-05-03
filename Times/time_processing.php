<?php
include '../Functions/insertIntoTable.php';
include '../Functions/verifyValue.php';
include '../Functions/existsInTableColumn.php';
include '../Functions/eventList.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    $servername = "localhost";
    $username = "lanny1";
    $password = "test123";
    $db = 'tracking';
    $conn = new mysqli($servername, $username, $password, $db);
    
    $user_username = $_POST['user'];
    $user_expected_password = $_POST['password'];

    // echo $user_expected_password;

    $used = existsInTableColumn($conn, 'UserDetails', 'Username', $user_username);

    if ($used){
        header('Location: ../Other/error_page.php');
        exit;
    }
    
    $result = verifyValue($conn, 'UserDetails','Password','Username',$user_username, $user_expected_password);

    if (!$result){
        header('Location: ../Other/error_page.php');
        exit;
    }

    foreach (EVENT_LIST as $event){
        if(isset($_POST[$event])) insertIntoTable($conn, 'Performances', 'id', 'event', 'time', $user_username, $event, $_POST[$event]);
    }
    header('Location: ../awards/awards.php');
?>