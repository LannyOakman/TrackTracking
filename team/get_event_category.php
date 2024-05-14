<?php
    include '../Other/sql_connection.php';
    include '../Functions/fetchValue.php';
    include '../Functions/existsInTableColumn.php';
    $event_id = $_POST['record_performance_event'];
    
    $event_category = fetchValue($conn, 'event_list', 'category', 'id_event', $event_id);
    echo $event_category;
?>