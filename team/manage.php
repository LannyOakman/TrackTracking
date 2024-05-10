<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Team</title>
    <link rel="stylesheet" href="../Registration/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php
    include '../Functions/eventList.php';
    include '../Functions/listMeet.php';
    ?>
    <script>
        $(function(){
            $('#submit_login_manage').click(function(){

                let form = document.getElementById('manage_team_login_form');
                let form_data = new FormData(form);

                $.ajax({
                    url: "../team/coach_login_back.php",
                    method: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        if (response.includes('Error: ')){
                            $('#return_text_manage_login').text(response);
                        }else{
                            let team_arr = response.split(';');
                            let team_id = team_arr[1].split(',');
                            let team_name = team_arr[2].split(',');
                            $('#return_text_manage_login').text('Hello ' + team_arr[0] + '!');

                            for(let i = 0; i < team_arr.length; i++){
                                $('#team_select').append(new Option(team_name[i], team_id[i]))
                            }

                            $('#manage_team_login').hide();
                            $('#team_selection').show();
                        }
                    },
                    error: function(xhr, status, error){
                        alert('Form not successful');
                        console.error(error);
                    }
                })
            });
        });

        $(function(){
            $('#submit_team_select').click(function(){
                $('#team_selection').hide();
                $('#manage_drop_add').show();
            });
        });

        $(function(){
            $('#event_signup').click(function(){
                $('#manage_drop_add').hide();
                $('#event_form_submission').show();

                let team_name = $('#team_select').children('option').filter(':selected').text();
                $('#return_text_manage_login').text('');
                $('#manage_h1').text('Select Events');
                // $('#team_athlete_select_label').text('Select member from ' + team_name + ':');
                let form = document.getElementById('team_selection_form');
                let form_data = new FormData(form);

                $.ajax({
                    url: "../team/get_athletes.php",
                    method: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        let arr = response.split(';');
                        let id_user = arr[0].split(',');
                        let first_name = arr[1].split(',');
                        let last_name = arr[2].split(',');
                        for(i = 0; i < id_user.length; i++){
                            let name_str = first_name[i] + ' ' + last_name[i] + ' (' + id_user[i] + ')'
                            $('#team_athlete_select').append(new Option(name_str, id_user[i]))
                        }
                    },
                    error: function(xhr, status, error){
                        alert('Form not successful');
                        console.error(error);
                    }
                });
            });
        });
        $(function(){
            $('#submit_event_form').click(function(){

                let team_id = $('#team_select').val();
                $('#team_id_event_form').val(team_id);

                let form = document.getElementById('event_form');
                let form_data = new FormData(form);
                $.ajax({
                    url: "../team/record_meet_signup.php",
                    method: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                    if (response != ""){
                        $('#return_text_manage_login').text(response);
                        
                    }else{
                        $('#event_form_submission').hide();
                        $('#return_text_manage_login').text('Success');
                    }
                    },
                    error: function(xhr, status, error){
                        alert('Form not successful');
                        console.error(error);
                    }
                });
                
            });
        });

        $(function(){
            $('#manage_members').click(function(){
                $('#manage_drop_add').hide();
                $('#add_drop_1').show();
                $('#manage_h1').text('Add/Drop Users');
                let form = document.getElementById('add_drop_user_form');
                let form_data = new FormData(form);
            });
        });

        $(function(){
            $('#add_user_btn').click(function(){
                $('#add_drop_1').hide();
                $('#add_user').show();
            })
        })

        $(function(){
            $('#drop_user_btn').click(function(){
                $('#add_drop_1').hide();
                $('#drop_user').show();
                let form = document.getElementById('event_form');
                let form_data = new FormData(form);
                $.ajax({
                    url: "../team/get_members.php",
                    method: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        alert(response);
                        // let arr = response.split(';');
                        // let id_user = arr[0].split(',');
                        // let first_name = arr[1].split(',');
                        // let last_name = arr[2].split(',');

                        // for(i = 0; i < id_user.length; i++){
                        //     let name_str = first_name[i] + ' ' + last_name[i] + ' (' + id_user[i] + ')'
                        //     $('#drop_athlete_select').append(new Option(name_str, id_user[i]))
                        // }
                    },
                    error: function(xhr, status, error){
                        alert('Form not successful');
                        console.error(error);
                    }
                });
            })
        })

    </script>
</head>
<body>
    <h1 id="manage_h1">Manage Team</h1>

    <div id="manage_team_login">
        <form id="manage_team_login_form">
        <input type="text" name="coach_username" placeholder="Coach Username" class="manage_team_login">
        </form>
        <button id="submit_login_manage" class="manage_team_login">Submit</button>     
    </div>

    <p id="return_text_manage_login"></p>

    <div id='team_selection' style="display:none">
        <form id="team_selection_form">
        <label for="team_select">Select Team</label>
        <select name="team_select" id="team_select">
        </select>
        </form>
        <button id='submit_team_select'>Submit</button>
    </div>

    <div id='manage_drop_add' style="display:none">
        <a id='event_signup'>
            <button>Event Sign-up</button>
        </a>
        <a id='manage_members'>
            <button>Manage Members</button>    
        </a>
    </div>
    
    <div id="event_form_submission" style="display:none">
    <form id='event_form'>
        <input type="text" id='team_id_event_form' style="display:none" name="team_id_event_form">
        <label for="team_athlete_select" id="team_athlete_select_label">Select athlete: </label>
        <select name="team_athlete_select" id="team_athlete_select"></select>
        <br>
        <label for="manage_meet_select" id="manage_meet_select_label">Select meet: </label>
        <select name="manage_meet_select" id="manage_meet_select">
            <?php
            listMeet();
            ?>
        </select>
        <br>
        <?php
            foreach(EVENT_LIST as $event){
                echo("
                <input type='checkbox' name='$event' id='$event' value ='$event'>
                <label for='$event'>$event</label>
                ");}
        ?>
    </form>
        <button id='submit_event_form'>Submit</button>
    </div>

    <div id='add_drop_1' style='display:none'>
        <button id='add_user_btn'>Add</button>
        <button id='drop_user_btn'>Drop</button>
    </div>

    <div id='add_user' style="display:none">
        <form id="add_drop_user_form">
            <label for="add_user_input">Add member: </label>
            <input type="text" id="add_user_input" name="add_user_input">
        </form>
        <button id="add_submit">Submit</button>
    </div>

    <div id='drop_user' style='display:none'>
        <form id='drop_user_form'>
            <label for="drop_athlete_select">Drop member:</label>
            <select name="drop_athlete_select" id="drop_athlete_select"></select>
        </form>
        <button id="drop_submit">Submit</button>
    </div>

    <a href="../Front/front.php" class="back_btn">
            <button>Back</button>
    </a>
</body>
</html>