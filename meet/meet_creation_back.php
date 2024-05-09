<?php
    include "../Functions/fetchValue.php";
    include "../Functions/insertIntoTable.php";
    include '../Other/sql_connection.php';

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