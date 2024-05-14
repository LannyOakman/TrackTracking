<?php
    include '../Other/sql_connection.php';

    $user_id = $_POST['drop_member_select'];
    $team_id = $_POST['team_id_drop_user'];

    $sql ="
        UPDATE
            affiliation_user
        SET
            role = 'removed'
        WHERE
            id_username = '$user_id'
        AND
            id_team = '$team_id';
    ";
    
    $conn -> query($sql);

    echo 'Success';
?>