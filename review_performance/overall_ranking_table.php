<?php
    include '../Other/sql_connection.php';
    include '../Functions/fetchValue.php';
    include '../Functions/existsInTableColumn.php';
    $selected_event = $_POST['event_select_overall_rankings'];
    $category = fetchValue($conn, 'event_list', 'category', 'id_event', $selected_event);
    if($category == 'field'){
        $sql =
        "SELECT
            greatest(performances.performance_1, performances.performance_2, performances.performance_3) as Performance, user_details.FirstName as 'First Name',
            user_details.LastName as 'Last Name', team_table.name as 'Team Name', meet.meet_name, meet.date as 'Date'
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
            event_list.id_event = '$selected_event'
        ORDER BY
            Performance
        DESC;";
        
    }else{
            $sql="
        SELECT
            performances.performance_1 as 'Performance 1', user_details.FirstName as 'First Name', user_details.LastName as 'Last Name', team_table.name as 'Team Name', meet.meet_name, meet.date as 'Date'
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
            event_list.id_event = '$selected_event'
        ORDER BY
            performance_1;
        ";
    }


    $html_str ="
    <table id='overall_ranking_table'>
        <tr>
            <th>Performance</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Team Name</th>
            <th>Meet</th>
            <th>Date</th>
        </tr>
    ";

    $result = $conn -> query($sql) -> fetch_all();

    foreach($result as $row){
        $html_str .= "<tr>";
        foreach($row as $text){
            $html_str .= "<td>$text</td>";
        }
        $html_str .= "</tr>";
    }
    $html_str .= '</table>';

    if(!str_ends_with($html_str, '</tr></table>')){
        $html_str ='<h4>No Athletes Registered</h4>';
    }

    echo $html_str;
?>