<?php
    include '../Other/sql_connection.php';
    include '../Functions/insertIntoTable.php';

    $athlete_id = $_POST['team_athlete_select'];
    $team_id = $_POST['record_performance_team_id'];
    $meet_id = $_POST['record_performance_meet_select'];
    $event_id = $_POST['record_performance_event'];
    $performance_run = $_POST['user_time_input'];
    $performance_field1 = $_POST['user_field_input_1'];
    $performance_field2 = $_POST['user_field_input_2'];
    $performance_field3 = $_POST['user_field_input_3'];
    $event_type = $_POST['event_category'];
// get id_meet_user_signup need id_meet, id_affiliation_user, id_event

$sql ="
    SELECT
        id_affiliation_user
    FROM
        affiliation_user
    WHERE
        id_username = '$athlete_id'
    AND
        id_team = '$team_id';
";

$result = $conn -> query($sql) -> fetch_all();

$id_affiliation_user = $result[0][0];

$sql = "
    SELECT
        id_meet_user_signup
    FROM
        meet_user_signup
    WHERE
        id_meet = '$meet_id'
    AND
        id_affiliation_user = '$id_affiliation_user'
    AND
        id_event = '$event_id';
    ";

    $result = $conn -> query($sql) -> fetch_all();

    $id_meet_user_signup = $result[0][0];

$sql = "
    SELECT
        *
    FROM
        performances
    WHERE
        id_meet_user_signup = '$id_meet_user_signup';
";

    $result = $conn -> query($sql) -> fetch_all();

    if($result){
        echo 'Event already recorded';
        exit;
    }

    if(!($event_type == 'field')){
        if ($performance_run == ''){
            echo 'Please fill out all fields';
            exit;
        }
        insertIntoTable($conn, 'performances', 'NULL', $id_meet_user_signup, $performance_run, 'NULL', 'NULL');
    }
    else{
        if($performance_field1 == '' || $performance_field2 == '' || $performance_field3 == ''){
            echo 'Please fill out all fields';
            exit;
        }
        insertIntoTable($conn, 'performances', 'NULL', $id_meet_user_signup, $performance_field1, $performance_field2, $performance_field3);
    }
    echo 'success';
    

?>