<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Tracking</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#submission_btn").click(function(){
            let html_collection = document.getElementsByClassName('registration');
            let class_arr = Array.from(html_collection);

            for(let i = 0; i < class_arr.length; i++){
                if (class_arr[i].value == ''){
                    document.getElementById('return_text_reg').innerHTML = "Please fill out all fields";
                    return;
                }
            }

            $.post("../Registration/registration_validation.php",
        {
            username: $("#username").val(),
            password: $("#password").val(),
            name_first: $("#name_first").val(),
            name_last: $("#name_last").val(),
            dob: $("#dob").val(),
            phone: $("#phone").val(),
            city: $("#city").val(),
            state: $("#state").val(),
            graduation: $("#graduation").val()
        },
            function(data, status){
                $('#return_text_reg').text(data);
                }
            );
        });
    });
</script>

</head>
<body>
    <h1>Create Account</h1>
    <div id="information_submission">
    <form method="post" name="reg" id='registration_form'>
        <label for="username">Username</label>         
        <input type="text" id="username" placeholder="Username" name="username" class ='registration'><br>
        <label for="password">Password</label>       
        <input type="text" id="password" placeholder="Password" name="password" class='registration'><br>
        <label for="name_first">First Name</label>         
        <input type="text" id="name_first" placeholder="First name" name="name_first" class='registration'><br>
        <label for="name_last">Last Name</label>       
        <input type="text" id="name_last" placeholder="Last name" name="name_last" class='registration'><br>
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" placeholder="MM/DD/YYYY" name="dob" class='registration'><br>
        <label for="phone">Phone number</label>
        <input type="text" id="phone" placeholder="xxx-xxx-xxxx" name="phone" class='registration'><br>
        <label for="city">City</label>
        <input type="text" id="city" placeholder="City" name="city" class='registration'><br>
        <label for="state">State</label>
        <input type="text" id="state" placeholder="state" name="state" class='registration'><br>
        <label for="graduation">Graduation Year</label>
        <input type="number" id="graduation" placeholder="20XX" name="graduation" class='registration'><br>
    </form>
    <button id="submission_btn">Submit</button>
    </div>
    
    <p id="return_text_reg"></p>
    <a href="../Front/front.php">
            <button>Back</button>
    </a>
</body>
</html>