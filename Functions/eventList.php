<?php
    include '../Other/sql_connection.php';

    $EVENT_LIST = [];

    $sql = "
    SELECT
        event
    FROM
        event_list;
    ";

    $result = $conn -> query($sql) -> fetch_all();

    foreach($result as $event){
        $arr = [str_replace(' ', '_', strtolower($event[0])), $event[0],];
        array_push($EVENT_LIST, $arr);
    }
?>