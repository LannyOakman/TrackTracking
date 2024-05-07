<?php
    include '../Functions/insertIntoTable.php';
    include '../Functions/existsInTableColumn.php';;
    $servername = "localhost";
    $username = "lanny1";
    $password = "test123";
    $db = 'tracking';
    $conn = new mysqli($servername, $username, $password, $db);

    $coach_name = $_POST['coach_name'];
    $team_name = $_POST['team_name'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    $used = existsInTableColumn($conn, "user_details", "id_username", $coach_name);
    if($used){
        header('Location: ../Registration/registration.php');
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
    header("Location: ../Front/front.php");
?>