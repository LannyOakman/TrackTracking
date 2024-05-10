<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Meet</title>
    <link rel="stylesheet" href="../Registration/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <h1>Create a Meet</h1>
    <form id = 'meet_form'>
    <input type="text" placeholder = 'Coach Username' name = 'coach' id="coach">
    <input type="text" placeholder = 'Team Name' name = 'team' id="team">
    <input type="text" placeholder = 'Meet Name' name = 'meet' id="meet">
    <input type="date" placeholder='YYYY-MM-DD'name = 'date' id="date">
    </form>
    <br>
    <button id='submit_meet'>submit</button>
    <p id='return_text_meet'></p>
    <a href="../Front/front.php">
    <button>Back</button>
    </a>
</body>
</html>