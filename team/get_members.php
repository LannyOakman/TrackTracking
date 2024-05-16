<?php
    include '../Other/sql_connection.php';

    $team_id = $_POST['team_select'];


    $sql = "
        SELECT
            affiliation_user.id_team, user_details.id_username, user_details.FirstName, user_details.LastName
        FROM
            affiliation_user
        INNER JOIN
            user_details
        ON
            affiliation_user.id_username = user_details.id_username
        WHERE
            id_team = $team_id
        AND
            role != 'removed';
    ";
    
    $result = $conn -> query($sql) -> fetch_all();

    $id_user = [];
    $first_name = [];
    $last_name = [];

    foreach($result as $row){
        array_push($id_user,$row[1]);
        array_push($first_name,$row[2]);
        array_push($last_name,$row[3]);
    }
    
    $arr_str = implode(',', $id_user) . ';' . implode(',', $first_name) . ';' . implode(',', $last_name);
    
    echo $arr_str;
?>