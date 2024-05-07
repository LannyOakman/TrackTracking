<?php
include '../Functions/insertIntoTable.php';
include '../Functions/verifyValue.php';
include '../Functions/existsInTableColumn.php';
include '../Functions/eventList.php';
include '../Functions/fetchValue.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    $servername = "localhost";
    $username = "lanny1";
    $password = "test123";
    $db = 'tracking';
    $conn = new mysqli($servername, $username, $password, $db);
    
    $coach_user = $_POST['coach'];
    $athlete_user = $_POST['athlete'];
    $meet_name = $_POST['events'];

    // $used = existsInTableColumn($conn, 'user_details', 'id_username', $coach_user);

    // if (!$used){
    //     header('Location: ../Other/error_page.php');
    //     exit;
    // }

    //$meet_id = fetchValue($conn, 'meet', 'id_meet', 'meet_name', $meet_name);

    // echo $meet_id;
    // $sql = "
    // SELECT
    //     id_affiliation
    // FROM
    //     affiliation_user
    // WHERE
    //     id_team = '$id_team' and id_username = '$athlete_user' and role = 'athlete';
    // ";

    // $id_affiliation = ($conn -> query($sql) -> fetch_all())[0][0];

    // for ($i = 0; $i < sizeof(EVENT_LIST); $i++){
    //     if (isset($_POST[EVENT_LIST[$i]])){
    //         insertIntoTable($conn, 'performances', 'NULL', $meet_id,($i + 2), $id_affiliation, $_POST[$EVENT_LIST[$i]]);
    //     }
    // }
?>