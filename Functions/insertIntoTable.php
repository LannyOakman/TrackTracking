<?php
    function insertIntoTable($db_link, $db_table, ...$columns_and_values){
        
        if (sizeof($columns_and_values) % 2 != 0) return('');
        
        $columns = [];
        $values = [];

        for ($i = 0; $i < sizeof($columns_and_values); $i++){
            if ($i<sizeof($columns_and_values)/2){
                array_push($columns, $columns_and_values[$i]);
            }else{
                array_push($values, $columns_and_values[$i]);
            }
        }

        $column_str = '';
        $values_str = '';

        foreach ($columns as $val){
            $column_str = $column_str . (string)$val .', ';
        }
        
        foreach ($values as $val){
            $values_str = $values_str . "'" . (string)$val . "'" . ', ';
        }
        
        $column_str = substr($column_str, 0, -2);
        $values_str = substr($values_str, 0, -2);

        $sql = "
            INSERT INTO $db_table
                ($column_str)
            Values
                ($values_str);";
        mysqli_query($db_link, $sql);
    }
?>