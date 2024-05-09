<?php
    include '../Functions/insertIntoTable.php';
    include '../Functions/existsInTableColumn.php';;
    include '../Other/sql_connection.php';

    $coach_name = $_POST['coach_name'];
    $team_name = $_POST['team_name'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    $errors = '';

    if ($coach_name == '' || $team_name == '' || $city == '' || $state == '' || $country == ''){
        echo 'Please fill out all fields';
        exit;
    }

    if (!existsInTableColumn($conn, "user_details", "id_username", $coach_name)){
        $errors = $errors . 'user does not exist, ';
    }
    
    if(existsInTableColumn($conn, 'team_table', 'name', $team_name)){
        $errors = $errors . 'team name already used';
    }

    if ($errors != ''){
        echo $errors;
        exit;
    }

    $sql = "
    INSERT INTO team_table VALUES(NULL,'$team_name','$city','$state','$country');
    ";

    $conn -> query($sql);
    

    $sql = "
    SELECT 
        id_team
    FROM
        team_table
    WHERE
        name = '$team_name';
    ";

    $result = $conn -> query($sql);
    $sql_array = $result->fetch_all();
    $id = $sql_array[0][0];

    $sql = "
    INSERT INTO affiliation_user VALUES(NULL,'$id','$coach_name', 'coach');
    ";
    
    $conn -> query($sql);
    
    echo("Success");
?>