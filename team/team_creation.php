<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Team</title>
    <link rel="stylesheet" href="../Registration/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../Other/style.css"/>
    <script>
        $(document).ready(function(){
            $('#submit_team').click(function(){

                let form = document.getElementById('teamform');
                let form_data = new FormData(form);

                $.ajax({
                    url: "../team/team_populate.php",
                    method: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        $('#return_text_team').text(response);
                    },
                    error: function(xhr, status, error){
                        alert('Form not successful');
                        console.error(error);
                    }
                })
            });
        });
    </script>
</head>

<body>

    <div class="form_wrapper">
    <div class="header">
    <h1>Create a Team</h1>
    </div>
        <form name="teamform" id="teamform">
            <div class="inline_flexbox">
                <div class="form-floating mb-3">
                    <input id = 'teamform_username'type="text" placeholder="Coach Userame" name="coach_name" class='form-control'>
                    <label for="teamform_username">Coach Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input id = 'teamform_team_name' type="text" placeholder="Team Name" name="team_name" class='form-control'>
                    <label for="teamform_team_name">Team Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input id = 'teamform_city' type="text" placeholder="City" name="city" class='form-control'>
                    <label for="teamform_city">City</label>
                </div>
                <div class="form-floating mb-3">
                    <input id = 'teamform_state' type="text" placeholder="State" name="state" class='form-control'>
                    <label for="teamform_state">State</label>
                </div>
                <div class="form-floating mb-3">
                    <input id = 'teamform_country' type="text" placeholder="Country" name="country" class='form-control'>
                    <label for="teamform_country">Country</label>
                </div>
            </div>    
        </form>
        <div class="bottom_btn_wrapper inline_flexbox">
            <a href="../Front/front.php" class="btn btn-primary">Back</a>
            <button id='submit_team' class="btn btn-primary">Submit</button>
        </div>
        <p id="return_text_team" class="return_text"></p>
    </div>
</body>
</html>