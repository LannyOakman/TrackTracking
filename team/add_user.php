<?php
        include '../Other/sql_connection.php';
        include '../Functions/insertIntoTable.php';
        include '../Functions/existsInTableColumn.php';



        if(!(isset($_POST['role']) && isset($_POST['add_user_input']))){
            echo 'Please fill out all fields';
            exit;
        }

        $user_id = $_POST['add_user_input'];
        $team_id = $_POST['team_id_add_user'];
        $role = $_POST['role'];

        if(!existsInTableColumn($conn, 'user_details', 'id_username', $user_id)){
            echo 'User does not exist';
            exit;
        }

        $sql = "
            SELECT
                *
            FROM
                affiliation_user
            WHERE
                id_username = '$user_id'
            AND
                role = '$role'
            AND
                id_team = '$team_id';
        ";

        $result = $conn -> query($sql) -> fetch_all();

        if($result){
            echo "User already has selected role";
            exit;
        }
    
        $sql ="
            SELECT
                *
            FROM
                affiliation_user
            WHERE
                id_username = '$user_id'
            AND
                id_team = '$team_id';
            ";
        
        $result = $conn -> query($sql) -> fetch_all();

        if ($result){
            $sql ="
            UPDATE
                affiliation_user
            SET
                role = '$role'
            WHERE
                id_username = '$user_id'
            AND
                id_team = '$team_id';
            ";
            $result = $conn -> query($sql);
        }
        else{
            insertIntoTable($conn, 'affiliation_user', 'NULL', $team_id, $user_id, $role);
        }
        
        echo 'success';
?>