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
            meet_name, id_meet
        FROM
            meet
        WHERE
            YEAR(date) > ($year);
        ";

        $result = $conn -> query($sql)-> fetch_all();
        foreach ($result as $row){
            echo("<option value='$row[1]'>$row[0]</option>");
        }
    }
?>