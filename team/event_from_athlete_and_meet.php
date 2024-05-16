<?php
    include '../Other/sql_connection.php';
    include '../Functions/fetchValue.php';
    $team_id = $_POST['record_performance_team_id'];
    $athlete = $_POST['team_athlete_select'];
    $meet_id = $_POST['record_performance_meet_select'];

    $sql="
    SELECT
        id_affiliation_user
    FROM
        affiliation_user
    WHERE
        id_team = '$team_id'
    AND
        id_username = '$athlete'
    ";

    $result = $conn -> query($sql)  -> fetch_all();

    $id_affiliation_user = $result[0][0];

    $sql="
    SELECT DISTINCT
        meet_user_signup.id_event, event_list.event, id_meet_user_signup
    FROM
        meet_user_signup
    INNER JOIN
        event_list
    ON
        meet_user_signup.id_event = event_list.id_event
    WHERE
        id_affiliation_user = '$id_affiliation_user'
    AND
        id_meet = '$meet_id';
    ";


    $result = $conn -> query($sql)  -> fetch_all();

    $event_id_list = [];
    $event_name_list = [];

    foreach($result as $row){
        $sql = "
        SELECT
            *
        FROM
            performances
        WHERE
            id_meet_user_signup = '$row[2]';
        ";
        
        $value = $conn -> query($sql) -> fetch_all();

        if(!$value){
            array_push($event_id_list, $row[0]);
            array_push($event_name_list, $row[1]);
        }
    }

    $arr_str = implode(',',$event_id_list) . ';' . implode(',',$event_name_list);

    echo $arr_str;
?>