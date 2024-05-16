<?php
    include '../Other/sql_connection.php';

    $meet = $_POST['review_meet_selection'];

    $sql="
    SELECT
	performances.performance_1
    FROM
        performances
    JOIN
        meet_user_signup
    ON
        meet_user_signup.id_meet_user_signup = performances.id_meet_user_signup
    WHERE
        meet_user_signup.id_meet = '$meet'
    ";

    $result = $conn -> query($sql) -> fetch_all();

    if ($result){
        $sql = "
        SELECT
            event_list.event as 'Event', performances.performance_1 as 'Performance 1', performances.performance_2 as 'Performance 2', performances.performance_3 as 'Performance 3', user_details.FirstName as 'First Name', user_details.LastName as 'Last Name', team_table.name as 'Team Name', meet.date as 'Date'
        FROM
            meet_user_signup
        JOIN
            meet
        ON
            meet_user_signup.id_meet = meet.id_meet
        JOIN
            affiliation_user
        ON
            meet_user_signup.id_affiliation_user = affiliation_user.id_affiliation_user
        JOIN
            user_details
        ON
            user_details.id_username = affiliation_user.id_username
        JOIN
            team_table
        ON
            team_table.id_team = affiliation_user.id_team
        JOIN
            event_list
        ON
            event_list.id_event = meet_user_signup.id_event
        JOIN
            performances
        ON
            performances.id_meet_user_signup = meet_user_signup.id_meet_user_signup
        WHERE
            meet.id_meet = '$meet'
        ORDER BY
            event_list.id_event;
        ";

        $html_str ="
        <table id='meet_review_table' class='table'>
            <tr>
                <th>Event</th>
                <th>Performance 1</th>
                <th>Performance 2</th>
                <th>Performance 3</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Team Name</th>
                <th>Date</th>
            </tr>
        ";
    }else{
        $sql = "
        SELECT
            event_list.event as 'Event', user_details.FirstName as 'First Name', user_details.LastName as 'Last Name', team_table.name as 'Team Name', meet.date as 'Date'
        FROM
            meet_user_signup
        JOIN
            meet
        ON
            meet_user_signup.id_meet = meet.id_meet
        JOIN
            affiliation_user
        ON
            meet_user_signup.id_affiliation_user = affiliation_user.id_affiliation_user
        JOIN
            user_details
        ON
            user_details.id_username = affiliation_user.id_username
        JOIN
            team_table
        ON
            team_table.id_team = affiliation_user.id_team
        JOIN
            event_list
        ON
            event_list.id_event = meet_user_signup.id_event
        WHERE
            meet.id_meet = '$meet'
        ORDER BY
            event_list.id_event;
        ";

        $html_str ="
        <table id='meet_review_table' class='table'>
            <tr>
                <th>Event</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Team Name</th>
                <th>Date</th>
            </tr>
        ";
    }

    
    $result = $conn -> query($sql) -> fetch_all();

    /*

    I should have used DataTables.
    
    */

    foreach($result as $row){
        $html_str .= "<tr>";
        foreach($row as $text){
            $html_str .= "<td>$text</td>";
        }
        $html_str .= "</tr>";
    }
    $html_str .= '</table>';

    if(!str_ends_with($html_str, '</tr></table>')){
        $html_str ='No Registered Athletes';
    }

    echo $html_str;
    
?>