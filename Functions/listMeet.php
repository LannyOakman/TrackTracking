<?php
    function listMeet(){
        $servername = "localhost";
        $username = "lanny1";
        $password = "test123";
        $db = 'tracking';
        $conn = new mysqli($servername, $username, $password, $db);

        $year = ((int)date("Y")) - 1;
        $sql="
        SELECT
            meet_name
        FROM
            meet
        WHERE
            YEAR(date) > ($year);
        ";

        $result = $conn -> query($sql)-> fetch_all();
        foreach ($result as $item){
            $item = $item[0];
            echo("<option value='$item'>$item</option>");
        }
    }
?>