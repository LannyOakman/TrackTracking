<?php
    include '../Other/sql_connection.php';
    include '../Functions/fetchValue.php';
    $team_id = $_POST['record_performance_team_id'];
    $athlete = $_POST['team_athlete_select'];

    $sql =
    "SELECT distinct
        meet.meet_name, meet.id_meet
    FROM
        affiliation_user
    JOIN
        meet_user_signup
    ON
        affiliation_user.id_affiliation_user = meet_user_signup.id_affiliation_user
    JOIN
        meet
    ON
        meet_user_signup.id_meet = meet.id_meet
    WHERE
        affiliation_user.id_team = '$team_id'
    AND
        affiliation_user.id_username = '$athlete'";

    $result = $conn -> query($sql)  -> fetch_all();

    if(!$result){
        exit;
    }

    $meet_name_list = [];
    $meet_id_list = [];

    foreach ($result as $item){
        array_push($meet_name_list, $item[0]);
        array_push($meet_id_list, $item[1]);
    }
    $arr_str = implode(',', $meet_name_list) . ';' . implode(',', $meet_id_list);

    echo $arr_str;
?>