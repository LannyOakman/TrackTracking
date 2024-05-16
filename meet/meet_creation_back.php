<?php
    include "../Functions/fetchValue.php";
    include "../Functions/insertIntoTable.php";
    include '../Other/sql_connection.php';
    include '../Functions/existsInTableColumn.php';

    $coach_user = $_POST['coach'];
    $team_name = $_POST['team'];
    $meet_name = $_POST['meet'];
    $date = $_POST['date'];
    $response_str= '';

    if ($coach_user == '' || $team_name == '' || $meet_name == '' || $date == ''){
        echo 'Please enter a value for each field';
        exit;
    }

    $sql="
    SELECT
        id_team
    FROM
        affiliation_user
    WHERE
        id_username = '$coach_user'
    AND
        role = 'coach'
    ";

    $num = $conn -> query($sql) -> fetch_all();


    /*
    
    Better way to return an error? Should I have responses stored somewhere else so I can
    just go to one place and edit responses? How do I do that?
    
    */ 

    if (!$num){
        $response_str = $response_str . 'coach not found, ';
    }

    if (!existsInTableColumn($conn, 'team_table', 'name', $team_name)){
        $response_str = $response_str . 'team does not exist, ';
    }

    if (existsInTableColumn($conn, 'meet', 'meet_name', $meet_name)){
        $response_str = $response_str . 'meet already exists, ';
    }
    
    if($response_str != ''){
        $response_str = substr($response_str, 0, -2);
        echo $response_str;
        exit;
    }
    
    $id_team = fetchValue($conn, 'team_table', 'id_team', 'name', $team_name);

    insertIntoTable($conn, 'meet', 'NULL', $id_team, $meet_name, $date);

    echo 'Success';
?>