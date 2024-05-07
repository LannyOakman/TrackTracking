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
?>