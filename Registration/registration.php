<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Tracking</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../Other/style.css">
    
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
            username: $("#username_create_account").val(),
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
<div class="form_wrapper">
<div class="header">
    <h1>Create Account</h1>
</div>
    <form method="post" name="reg" id='registration_form'>
        <div class="inline_flexbox">
        <div class = "form-floating mb-3">
            <input type="text" id="username_create_account" placeholder="Username" name="username" class ='form-control'>
            <label for="username_create_account">Username</label> 
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="password" placeholder="Password" name="password" class='form-control'>
            <label for="password">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="name_first" placeholder="First name" name="name_first" class='form-control'>
            <label for="name_first">First Name</label> 
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="name_last" placeholder="Last name" name="name_last" class='form-control'>
            <label for="name_last">Last Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" id="dob" placeholder="MM/DD/YYYY" name="dob" class='form-control'>
            <label for="dob">Date of Birth</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="phone" placeholder="xxx-xxx-xxxx" name="phone" class='form-control'>
            <label for="phone">Phone number</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="city" placeholder="City" name="city" class='form-control'>
            <label for="city">City</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="state" placeholder="state" name="state" class='form-control'>
            <label for="state">State</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" id="graduation" placeholder="20XX" name="graduation" class='form-control'>
            <label for="graduation">Graduation Year</label>
        </div>
</div>
    </form>
    <div id="div004" class="bottom_btn_wrapper inline_flexbox">
        <a href="../Front/front.php" class="btn btn-primary">Back</a>
        <button id="submission_btn" class="btn btn-primary">Submit</button>
    </div>

    <p id="return_text_reg" class="return_text"></p>
    </div>
</div>
</body>
</html>