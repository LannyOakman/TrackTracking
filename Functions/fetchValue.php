<?php
    function fetchValue($sql_conn, $sql_table, $unkown_column, $known_column, $known_value){
    if (!existsInTableColumn($sql_conn, $sql_table, $known_column, $known_value)) return 0;
    $sql = "
    SELECT 
        $unkown_column
    FROM
        $sql_table
    WHERE
        $known_column = '$known_value';";
    $result = mysqli_query($sql_conn, $sql);
    $sql_array = $result->fetch_all();
    return $sql_array[0][0];
}
?>