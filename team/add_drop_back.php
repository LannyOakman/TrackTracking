<?php
include "../Functions/fetchValue.php";
include "../Functions/insertIntoTable.php";
include '../Other/sql_connection.php';
include '../Functions/existsInTableColumn.php';

    $athlete = $_POST['athlete'];
    $coach = $_POST['coach'];
    $team = $_POST['team'];
    $role = $_POST['role'];

    $id_team = fetchValue($conn, 'team_table', 'id_team', 'name', $team);

    if(!$id_team){
        header('Location: ../Other/error_page.php');
        exit;
    }

    if (isset($_POST['add'])){
        insertIntoTable($conn, 'affiliation_user', 'NULL', $id_team, $athlete, $role);
    }
    else{
        // remove from member table where name == name and id = (fetch team id)
        $sql ="
        DELETE FROM
            affiliation_user
        WHERE
            id_team = '$id_team'
        AND
            id_username = '$athlete';
        ";
        $conn -> query($sql);
    }
    header('Location: ../Other/success_page.php');
?>