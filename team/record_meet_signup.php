<?php
    include '../Other/sql_connection.php';
    include '../Functions/eventList.php';
    include '../Functions/insertIntoTable.php';

    $team_id = $_POST['team_id_event_form'];
    $meet_id = $_POST['manage_meet_select'];
    $athlete_id = $_POST['team_athlete_select'];

    $sql="
    SELECT
        id_affiliation_user
    FROM
        affiliation_user
    WHERE
        id_team = '$team_id'
    AND
        id_username = '$athlete_id';
    ";

    $result = $conn -> query($sql) -> fetch_all();

    $id_affiliation_user = $result[0][0];

    $count = 0;

    for ($i = 0; $i < sizeof(EVENT_LIST); $i++){
        if (isset($_POST[EVENT_LIST[$i]])){
            insertIntoTable($conn, 'meet_user_signup', 'NULL', $id_affiliation_user, ($i + 2));
            $count++;
        }
    }

    if(!$count){
        echo 'Please select a meet';
        exit;
    }
?>