<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Meet</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../Other/style.css"/>
    <script>
        $(document).ready(function(){
            $('#submit_meet').click(function(){

                let form = document.getElementById('meet_form');
                let form_data = new FormData(form);


                $.ajax({
                    url: "../meet/meet_creation_back.php",
                    method: 'POST',
                    data: form_data,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        $('#return_text_meet').text(response);
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
        <h1>Create a Meet</h1>
    </div>
        <form id = 'meet_form'>
        <div class="inline_flexbox">
            <div class="form-floating mb-3">
                <input type="text" placeholder = 'Coach Username' name = 'coach' id="coach" class='form-control'>
                <label for="coach">Coach Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" placeholder = 'Team Name' name = 'team' id="team" class='form-control'>
                <label for="team">Team Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" placeholder = 'Meet Name' name = 'meet' id="meet" class='form-control'>
                <label for="meet">Meet Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" placeholder='YYYY-MM-DD'name = 'date' id="date" class='form-control'>
                <label for="date">Date</label>
            </div>
        </div>
        </form>
        <div class="bottom_btn_wrapper inline_flexbox">
            <a href="../Front/front.php" class="btn btn-primary">Back</a>
            <button id='submit_meet' class="btn btn-primary">Submit</button>            
        </div>
        <p id='return_text_meet' class="return_text"></p>
    </div>

</body>
</html>