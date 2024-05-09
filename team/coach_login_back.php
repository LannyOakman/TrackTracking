<?php
    include '../Other/sql_connection.php';
    include '../Functions/existsInTableColumn.php';
    $coach = $_POST['coach_username'];
    
    $sql="
    SELECT
        id_team
    FROM
        affiliation_user
    WHERE
        id_username = '$coach'
    AND
        role = 'coach'
    ";
    $num = $conn -> query($sql) -> fetch_all();

    if(!$num){
        header('Location: ../Other/error_page.php');
    }
    
    
?>