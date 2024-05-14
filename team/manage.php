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
                            $('#team_athlete_select_hidden').append(new Option(name_str, id_user[i]))
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
                $('#add_drop').show();
                $('#manage_h1').text('Add/Drop Users');
                let form = document.getElementById('add_user_form');
                let form_data = new FormData(form);
            });
        });

        $(function(){
            $('#add_user_btn').click(function(){
                $('#add_drop').hide();
                $('#add_user').show();
            })
        })

        $(function(){
            $('#add_submit').click(function(){ 
                let team_id = $('#team_select').val();
                $('#team_id_add_user').val(team_id);
                let form = document.getElementById('add_user_form');
                let form_data = new FormData(form);
                $.ajax({
                    url: "../team/add_user.php",
                    method: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        if(response === 'success'){
                            $('#add_user').hide();
                        }
                        $('#return_text_manage_login').text(response);
                    },
                    error: function(xhr, status, error){
                        alert('Form not successful');
                        console.error(error);
                    }
                });
            })
        })

        $(function(){
            $('#drop_user_btn').click(function(){
                $('#add_drop').hide();
                $('#drop_user').show();
                let form = document.getElementById('team_selection_form');
                let form_data = new FormData(form);
                $.ajax({
                    url: "../team/get_members.php",
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
                            $('#drop_member_select').append(new Option(name_str, id_user[i]))
                        }
                    },
                    error: function(xhr, status, error){
                        alert('Form not successful');
                        console.error(error);
                    }
                });
            })
        })

        $(function(){
            $('#drop_submit').click(function(){
                $('#drop_user').hide();
                let team_id = $('#team_select').val();
                $('#team_id_drop_user').val(team_id);
                let form = document.getElementById('drop_user_form');
                let form_data = new FormData(form);
                $.ajax({
                    url: "../team/drop_user.php",
                    method: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        $('#return_text_manage_login').text(response);
                    },
                    error: function(xhr, status, error){
                        alert('Form not successful');
                        console.error(error);
                    }
                });
            })
        })

        $(function(){
            $('#event_performance').click(function(){
                $('#manage_h1').text('Record Performance');
                $('#manage_drop_add').hide();
                $('#record_performance_athlete_select').html($('#team_athlete_select_hidden').html());
                $('#record_performance_athlete_select').append(new Option('Select an Option', null,true, true));
                $('#record_performance').show();
            })
        })

        $(function(){
            $('#record_performance_athlete_select').change(function(){
                let team_id = $('#team_select').val();
                $('#record_performance_team_id').val(team_id);
                let form = document.getElementById('record_performance_form');
                let form_data = new FormData(form);
                $.ajax({
                    url: "../team/meet_from_athlete.php",
                    method: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                            if (response === '') return;
                            $('#record_performance_meet_select').find('option').remove().end();
                            $('#record_performance_event_select').find('option').remove().end();
                            let arr = response.split(';');
                            let meet_name_list = arr[0].split(',');
                            let meet_id_list = arr[1].split(',');
                            $('#record_performance_meet_select').append(new Option('Select an Option', null, true));
                            for(let i = 0; i < meet_id_list.length; i++){
                                $('#record_performance_meet_select').append(new Option(meet_name_list[i], meet_id_list[i]));
                            }
                    },
                    error: function(xhr, status, error){
                        alert('Form not successful');
                        console.error(error);
                    }
                });
            })
        })

        $(function(){
            $('#record_performance_meet_select').change(function(){
                let team_id = $('#team_select').val();
                $('#record_performance_team_id').val(team_id);
                let form = document.getElementById('record_performance_form');
                let form_data = new FormData(form);
                $.ajax({
                    url: "../team/event_from_athlete_and_meet.php",
                    method: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        $('#record_performance_event_select').find('option').remove().end();
                        let arr = [];
                        let event_id_list = [];
                        let event_name_list = [];
                        arr = response.split(';');
                        event_id_list = arr[0].split(',');
                        event_name_list = arr[1].split(',');
                        $('#record_performance_event_select').append(new Option('Select an Option', null, true));
                        for(let i = 0; i < event_id_list.length; i++){
                            $('#record_performance_event_select').append(new Option(event_name_list[i], event_id_list[i]));
                        }
                    },
                    error: function(xhr, status, error){
                        alert('Form not successful');
                        console.error(error);
                    }
                })
            })
        })

        $(function(){
            $('#record_performance_event_select').change(function(){
                let form = document.getElementById('record_performance_form');
                let form_data = new FormData(form);
                $.ajax({
                    url: "../team/get_event_category.php",
                    method: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        $('#performance_input').show();
                        $('#event_category').val(response);
                        if (response == 'field'){
                            $('#performance_type_label').text('Enter in meters (XX.XX): ');
                            $('#running_input').hide();
                            $('#field_input').show();
                        }else{
                            $('#performance_type_label').text('Enter Time (XX:XX.XX):')
                            $('#field_input').hide();
                            $('#running_input').show();
                        }
                    },
                    error: function(xhr, status, error){
                        alert('Form not successful');
                        console.error(error);
                    }
                })
            })
        })

        $(function(){
            $('#performance_submit').click(function(){
                let form = document.getElementById('record_performance_form');
                let form_data = new FormData(form);
                $.ajax({
                    url: "../team/store_time.php",
                    method: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        $('#return_text_manage_login').text(response);
                        if (response === 'success'){
                            $('#record_performance').hide();
                        }
                    },
                    error: function(xhr, status, error){
                        alert('Form not successful');
                        console.error(error);
                    }
                })
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
        <button id='event_signup'>Event Sign-up</button>
        <button id='manage_members'>Manage Members</button>
        <button id='event_performance'>Record Performance</button>    
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

    <div id='add_drop' style='display:none'>
        <button id='add_user_btn'>Add</button>
        <button id='drop_user_btn'>Drop</button>
    </div>

    <div id='add_user' style="display:none">
        <form id="add_user_form">
            <label for="add_user_input">Add member: </label>
            <input type="text" id="add_user_input" name="add_user_input" placeholder="Member Username">
            <input type="text" style="display:none" id=team_id_add_user name=team_id_add_user>
            <h4>Added member's role: </h4>
            <label for="coach">Coach:</label>
            <input type="radio" value="coach" name="role" id="coach_r">
            <label for="athlete">Athlete:</label>
            <input type="radio" value="athlete" name="role" id="athlete_r">
        </form>
        <button id="add_submit">Submit</button>
    </div>

    <div id='drop_user' style='display:none'>
        <form id='drop_user_form'>
            <label for="drop_member_select">Drop member:</label>
            <select name="drop_member_select" id="drop_member_select"></select>
            <input type="text" style="display:none" id=team_id_drop_user name=team_id_drop_user>
        </form>
        <button id="drop_submit">Submit</button>
    </div>
    
    <div id='record_performance' style="display:none">
    <form id="record_performance_form">
        <label for="record_performance_athlete_select">Select Athlete</label>
        <select name="team_athlete_select" id="record_performance_athlete_select"></select>
        <br>
        <label for="record_performance_meet_select">Select Meet</label>
        <select name="record_performance_meet_select" id="record_performance_meet_select"></select>
        <br>
        <label for="record_performance_event_select">Select Event</label>
        <select name="record_performance_event" id="record_performance_event_select"></select>
        <input type="text" id="record_performance_team_id"name="record_performance_team_id" style="display:none">
        <input type="text" id="event_category" name="event_category" style="display:none">
        
        <div id='performance_input' style="display:none">
        <h4 id="performance_type_label"></h5>
        <div id='running_input'>
            <input type="text" id="user_time_input" name="user_time_input" placeholder="XX:XX.XX">
        </div>

        <div id='field_input'>
            <input type="text" id="user_field_input_1" name="user_field_input_1" placeholder="XX.XX">
            <input type="text" id="user_field_input_2" name="user_field_input_2" placeholder="XX.XX">
            <input type="text" id="user_field_input_3" name="user_field_input_3" placeholder="XX.XX">
        </div>
        </div>
    </form>
    <button id='performance_submit'>Submit</button>
    </div>
    

    
    <a href="../Front/front.php" class="back_btn">
            <button>Back</button>
    </a>
    <select name="team_athlete_select" id="team_athlete_select_hidden" style="display:none"></select>
</body>
</html>