<?php
    function insertIntoTable($db_link, $db_table, ...$values){
        
        $value_str = '';

        foreach ($values as $val){
            if($val == 'NULL'){
                $value_str = $value_str . $val . ', ';
            }else{
                $value_str = $value_str . "'" . (string)$val . "'" . ', ';
            }
        }

        $value_str = substr($value_str, 0, -2);

        $sql = "
        INSERT INTO
            $db_table
        VALUES
            ($value_str);";
        
        mysqli_query($db_link, $sql);
    }
?>