<?php
    function eventsToHTML(){
        include '../Other/sql_connection.php';
        $sql = "
        SELECT DISTINCT
            id_event, event
        FROM
            event_list
        ORDER BY
            id_event
        ";

        $result = $conn -> query($sql) -> fetch_all();
        foreach($result as $row){
            echo ("<option value='$row[0]'>$row[1]</option>");
        }
    }
?>