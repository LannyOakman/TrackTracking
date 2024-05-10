<?php
    function listTeam(){
        include '../Other/sql_connection.php';
        
        

        $sql="
        SELECT
            meet_name
        FROM
            meet
        WHERE
            
        ";

        $result = $conn -> query($sql)-> fetch_all();
        foreach ($result as $item){
            $item = $item[0];
            echo("<option value='$item'>$item</option>");
        }
    }
?>