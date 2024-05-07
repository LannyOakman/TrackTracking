<?php
    include "../Functions/fetchValue.php";
    include "../Functions/insertIntoTable.php";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $servername = "localhost";
    $username = "lanny1";
    $password = "test123";
    $db = 'tracking';
    $conn = new mysqli($servername, $username, $password, $db);

    $coach_user = $_POST['coach'];
    $team_name = $_POST['team'];
    $meet_name = $_POST['meet'];
    $date = $_POST['date'];

    $id_team = fetchValue($conn, 'team_table', 'id_team', 'name', $team_name);

    if (!$id_team){
        header('Location: ../Other/error_page.php');
        exit;
    }

    insertIntoTable($conn, 'meet', 'NULL', $id_team, $meet_name, $date);
    header('Location: ../Front/front.php');
?>