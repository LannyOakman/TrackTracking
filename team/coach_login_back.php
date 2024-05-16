<?php
    include '../Other/sql_connection.php';
    include '../Functions/existsInTableColumn.php';
    include '../Functions/fetchValue.php';

    $coach = $_POST['coach_username'];

    $response_str = '';

    $sql="
    SELECT
        team_table.id_team, team_table.name
    FROM
        team_table
    INNER JOIN
        affiliation_user
    ON
        team_table.id_team = affiliation_user.id_team
    WHERE
        id_username = '$coach'
    AND
        role = 'coach'
    ";

    $result = $conn -> query($sql) -> fetch_all();

    if($coach == ''){
        echo 'Error: Please fill out data field';
        exit;
    }

    if(!$result){
        echo 'Error: Coach not found.';
        exit;
    }
    
    $coach_name = fetchValue($conn, 'user_details', 'FirstName', 'id_username', $coach);
    
    $response_str .= $coach_name . ';';

    /*
    

    A better way to convert a 2d array to string so I can use it on the front end?


    */


    foreach ($result as $item){
        $response_str .= $item[0] . ',';
    }
    $response_str = substr($response_str, 0, -1);
    $response_str .= ';';

    foreach ($result as $item){
        $response_str .= $item[1] . ',';
    }
    $response_str = substr($response_str, 0, -1);

    echo $response_str;
?>