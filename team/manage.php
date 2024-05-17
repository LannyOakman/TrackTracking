<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Team</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../Other/style.css">
    <?php
    include '../Functions/ajaxForm.php';
    include '../Functions/eventList.php';
    include '../Functions/listMeet.php';
    ?>
    <script>
/*


This is mildly horrific. I'm thinking I could have made a js function to simplify
this all a lot. Something like:

    function ajaxFunction(successFunction){
            $.ajax({
        url: "../team/get_athletes.php",
        method: 'POST',
        data: form_data,
        processData: false,
        contentType: false,
        success: function(response){
            successFunction(response)
        },
        error: function(xhr, status, error){
            alert('Form not successful');
            console.error(error);
        }
    }
    ...

    $(function(){
        $('#some_id').click(function(){
            ...
            ajaxFunction(function(){
                ...
            })
        })
    })


But that didn't end up working how I thought it would. There's just a lost of reused
ajax stuff and it's kind of annoying.


*/

function ajaxFunction(form_data, successFunction){
        $.ajax({
        url: "../team/get_athletes.php",
        method: 'POST',
        data: form_data,
        processData: false,
        contentType: false,
        success: function(response){
            successFunction(response);
        },
        error: function(xhr, status, error){
            alert('Form not successful');
            console.error(error);
        }
    })
}

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
                            $('.return_text').text(response);
                        }else{
                            let team_arr = response.split(';');
                            let team_id = team_arr[1].split(',');
                            let team_name = team_arr[2].split(',');
                            $('.return_text').text('Hello ' + team_arr[0] + '!');

                            $('#team_select').append(new Option('Select Team', null, true, true));
                            $('#team_select option[value="null"]').prop('disabled', true).hide()

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
                if ($('#team_select').val() == null){
                    $('.return_text').text('Please select a team.');
                    return;
                }
                $('.return_text').text('');
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
                $('.return_text').text('');
                $('#manage_h1').text('Select Events');
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
                        $('.return_text').text(response);
                        
                    }else{
                        $('.return_text').text('Success');
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
                        $('.return_text').text(response);
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
                        $('.return_text').text(response);
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
                $('#record_performance_athlete_select').append(new Option('Select Athlete', null, true, true));
                $('#record_performance_athlete_select option[value="null"]').prop('disabled', true);
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
                            $('#record_performance_meet_select').append(new Option('Select Meet', null, true));
                            $('#record_performance_meet_select option[value="null"]').prop('disabled', true);
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
                        $('#record_performance_event_select').append(new Option('Select Event', null, true));
                        $('#record_performance_event_select option[value="null"]').prop('disabled', true);
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
                            $('#performance_type_label').text('Enter Distance (XX.XX m): ');
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
                        $('.return_text').text(response);
                        if (response === 'success'){
                            $('#running_input').hide();
                            $('#field_input').hide();
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
            $('#back_team_selection').click(function(){
                $('#team_selection').hide();
                $('#team_select').find('option').remove().end(1);
                $('.return_text').text('');
                $('#manage_team_login').show();
            })
        })

        $(function(){
            $('#back_event_form_submission').click(function(){
                $('#event_form_submission').hide();
                $('#manage_drop_add').show();
                $('.return_text').text('');
            })
        })

        $(function(){
            $('#back_add_drop').click(function(){
                $('#add_drop').hide();
                $('#manage_drop_add').show();
                $('.return_text').text('');
            })
        })

        $(function(){
            $('#back_add_user').click(function(){
                $('#add_user').hide();
                $('#add_drop').show();
                $('.return_text').text('');
            })
        })

        $(function(){
            $('#back_drop_user').click(function(){
                $('#drop_user').hide();
                $('#add_drop').show();
                $('.return_text').text('');
            })
        })
        
        $(function(){
            $('#back_record_performance').click(function(){
                $('#record_performance').hide();
                $('#manage_drop_add').show();
                $('.return_text').text('');
            })
        })
    </script>
</head>
<body>
    

    <div id="manage_team_login" class="form_wrapper">
    <div class="header">
    <h1>Manage Team</h1>        
    </div>
        <form id="manage_team_login_form">
            <div class="inline_flexbox">
            <div class="form-floating mb-3">
                <input type="text" name="coach_username" placeholder="Coach Username" class="form-control" id="coach_username_manage">
                <label for="coach_username_manage">Coach Username</label>
            </div>
            </div>
        </form>
        <div class="bottom_btn_wrapper inline_flexbox">
            <a href="../Front/front.php" class="btn btn-primary">Back</a>
            <button id="submit_login_manage" class="btn btn-primary">Login</button>
        </div>
    </div>
    

    <div id='team_selection' style="display:none" class="form_wrapper">
    <div class="header">
    <h1>Select Team</h1>      
    </div>    
    <form id="team_selection_form">
        <div class="inline_flexbox">
                <select name="team_select" id="team_select" class="form-select">
                    <option value="" selected disabled hidden>Select Team</option>
                </select>
        </div>
        </form>
        <div class="bottom_btn_wrapper inline_flexbox">
            <a class="btn btn-primary" id="back_team_selection" >Back</a>
            <button id='submit_team_select' class="btn btn-primary">Submit</button>
        </div>
    </div>

    <div id='manage_drop_add' style="display:none" class="form_wrapper">
    <div class="header">
        <h1>Manage Team</h1>
    </div>    
        <div class="inline_flexbox">
            <button id='event_signup' class="btn btn-secondary">Event Sign-up</button>
            <button id='manage_members' class="btn btn-secondary">Manage Members</button>
            <button id='event_performance' class="btn btn-secondary">Record Performance</button>
        </div>
        <div class="bottom_btn_wrapper inline_flexbox">
            <a class="btn btn-primary" href="../Front/front.php">Back</a>  
        </div>
    </div>
    
    <div id="event_form_submission" style="display:none" class="form_wrapper">
    <form id='event_form'>
    <div class="header">
        <h1>Event Registration</h1> 
    </div>
        <div class="inline_flexbox">
        <input type="text" id='team_id_event_form' style="display:none" name="team_id_event_form">
        <select name="team_athlete_select" id="team_athlete_select" class="form-select">
            <option value="" selected disabled hidden>Select Athlete</option>
        </select>
        <select name="manage_meet_select" id="manage_meet_select" class="form-select">
            <option value="" selected disabled hidden>Select Meet</option>
            <?php
            listMeet();
            ?>
        </select>
        </div>
        <div class="two_column">
        <?php
            foreach($EVENT_LIST as $event){
                echo("
                <div class='checkbox_with_label'>
                <input type='checkbox' name='$event[0]' id='$event[0]' value ='$event[0]'>
                <label for='$event[0]' class='event_checkbox'>$event[1]</label>
                </div>
                ");}
        ?>
        </div>
    </form>
        <div class="bottom_btn_wrapper inline_flexbox">
            <a class="btn btn-primary" id="back_event_form_submission">Back</a>
            <button id='submit_event_form' class="btn btn-primary">Submit</button>            
        </div>
    </div>

    <div id='add_drop' style='display:none' class="form_wrapper">
    <div class="header">
        <h1>Add/Drop</h1> 
    </div>
    <div class="inline_flexbox">  
        <button id='add_user_btn' class="btn btn-secondary">Add</button>
        <button id='drop_user_btn' class="btn btn-secondary">Drop</button>
    </div>
        <div class="bottom_btn_wrapper inline_flexbox">
            <a class="btn btn-primary" id="back_add_drop">Back</a>
        </div>
    </div>


    <div id='add_user' style="display:none" class="form_wrapper">
        <div class="header">
            <h1>Add</h1> 
        </div>
        <form id="add_user_form">
            <div class="inline_flexbox">
                <div class="form-floating mb-3">
                <input type="text" id="add_user_input" name="add_user_input" placeholder="Member Username" class="form-control">
                <label for="add_user_input">Add member: </label>
                </div>
            </div>

            <input type="text" style="display:none" id=team_id_add_user name=team_id_add_user>
            <div class="inline_flexbox">
                <h5>Added member's role:</h5>
                <div class="form-check">
                <input type="radio" value="coach" name="role" id="coach_r">
                <label for="coach_r">Coach:</label>
                <input type="radio" value="athlete" name="role" id="athlete_r">
                <label for="athlete_r">Athlete:</label>
                </div> 
            </div>
            </form>
            <div class="bottom_btn_wrapper inline_flexbox">
            <a class="btn btn-primary" id="back_add_user">Back</a>
            <button id="add_submit" class="btn btn-primary">Submit</button>
            </div>
    </div>

    <div id='drop_user' style='display:none' class="form_wrapper">
    <div class="header">
            <h1>Drop</h1> 
    </div>
        <form id='drop_user_form'>
            <div class="inline_flexbox">
            <select name="drop_member_select" id="drop_member_select" class="form-select">
                <option value="" selected disabled hidden>Select Member</option>
            </select>
            </div>
            <input type="text" style="display:none" id=team_id_drop_user name=team_id_drop_user>
        </form>
        <div class="bottom_btn_wrapper inline_flexbox">
            <a class="btn btn-primary" id="back_drop_user">Back</a>    
            <button id="drop_submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    
    <div id='record_performance' style="display:none" class="form_wrapper">
    <div class="header">
            <h1>Record Performance</h1> 
    </div>
    <form id="record_performance_form">
        <div class="inline_flexbox">
        <select name="team_athlete_select" id="record_performance_athlete_select" class="form-select"></select>
        <select name="record_performance_meet_select" id="record_performance_meet_select" class="form-select"></select>
        <select name="record_performance_event" id="record_performance_event_select" class="form-select"></select>
        <input type="text" id="record_performance_team_id"name="record_performance_team_id" style="display:none">
        <input type="text" id="event_category" name="event_category" style="display:none">
        </div>
        <div id='performance_input' style="display:none">
        <div class="inline_flexbox">
            <h4 id="performance_type_label"></h4>
        </div>
        
        <div id='running_input' class="inline_flexbox">
            <div class="form-floating mb-3">
                <input type="text" id="user_time_input" name="user_time_input" placeholder="XX:XX.XX" class="form-control">
                <label for="user_time_input">XX:XX.XX</label>
            </div>    
        </div>

        <div id='field_input' class="inline_flexbox">
            <div class="form-floating mb-3">
            <input type="text" id="user_field_input_1" name="user_field_input_1" placeholder="XX.XX" class="form-control">
            <label for="user_field_input_1">XX.XX</label>                
            </div>
            <div class="form-floating mb-3">
            <input type="text" id="user_field_input_2" name="user_field_input_2" placeholder="XX.XX" class="form-control">
            <label for="user_field_input_2">XX.XX</label>
            </div>
            <div class="form-floating mb-3">
            <input type="text" id="user_field_input_3" name="user_field_input_3" placeholder="XX.XX" class="form-control">
            <label for="user_field_input_3">XX.XX</label>
            </div>
        </div>
        </div>
    </form>
        <div class="bottom_btn_wrapper inline_flexbox">
            <a class="btn btn-primary" id="back_record_performance">Back</a>
            <button id='performance_submit' class="btn btn-primary">Submit</button>            
        </div>

    </div>
    <select name="team_athlete_select" id="team_athlete_select_hidden" style="display:none"></select>
<script>
    let return_text_append = "<p class='return_text'><p>";
    $('.form_wrapper').append(return_text_append);
</script>
</body>
</html>