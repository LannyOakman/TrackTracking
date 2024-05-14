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

    $error_str = '';

    for ($i = 0; $i < sizeof(EVENT_LIST); $i++){
        if (isset($_POST[EVENT_LIST[$i]])){
            $event_index = $i + 2;
            $sql = "
                SELECT
                    *
                FROM
                    meet_user_signup
                WHERE
                    id_meet = '$meet_id'
                AND
                    id_affiliation_user = '$id_affiliation_user'
                AND
                    id_event = '$event_index'
            ";
            $result = $conn -> query($sql) -> fetch_all();

            if(!$result){
                insertIntoTable($conn, 'meet_user_signup', 'NULL', $meet_id, $id_affiliation_user, $event_index);
            }else{
                $error_str = $error_str . EVENT_LIST[$i] . ', ';
            }

            $count++;
        }
    }
    if ($error_str != ''){
        $error_str = substr($error_str, 0, -2);
        $error_str = $error_str . ' has already been submitted';
        echo $error_str;
    }

    if(!$count){
        echo 'Please select an event';
        exit;
    }
?>