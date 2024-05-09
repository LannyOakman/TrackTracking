<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Team</title>
    <link rel="stylesheet" href="../Registration/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                        consol.error(error);
                    }
                })
            });
        });
    </script>
</head>

<body>

    <h1>Create a Team</h1>
        <form name="teamform" id="teamform">
            <div id="input_teamform">
                <input type="text" placeholder="Coach Userame" name="coach_name">
                <input type="text" placeholder="Team Name" name="team_name">
                <input type="text" placeholder="City" name="city">
                <input type="text" placeholder="State" name="state">
                <input type="text" placeholder="Country" name="country">
            </div>    
        </form><br>
            <button id='submit_team'>Submit</button>
        <p id="return_text_team"></p>
        </form>
        <a href="../Front/front.php">
            <button>Back</button>
        </a>

</body>
</html>