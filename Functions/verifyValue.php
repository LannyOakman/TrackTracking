<?php
// I don't think I use this, but I don't want to delete it just in case.
    function verifyValue($sql_conn, $sql_table, $unkown_column, $known_column, $known_value, $expected_value){
    $sql = "
    SELECT 
        $unkown_column
    FROM
        $sql_table
    WHERE
        $known_column = '$known_value';";
    $result = mysqli_query($sql_conn, $sql);
    $sql_array = $result->fetch_all();
    $checked = $sql_array[0][0];
    if ($checked == $expected_value){
        return(true);
    }
    return false;
}
?>