<?php
    function existsInTableColumn($SQL_connection, $table_name, $column_name, $looking_for){
        $sql = "
        SELECT
            *
        FROM
            $table_name
        WHERE
            $column_name = '$looking_for';";
        
        $result = mysqli_query($SQL_connection, $sql);
        return(((boolean)mysqli_num_rows($result)));
    }
?>