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
        $("#check").click(function(){
            $.post("../Registration/registration_validation.php",
        {
            username: $("#username").text(),
            password: $("#password").text(),
            name_first: $("#name_first").text(),
            name_last: $("#name_last").text(),
            dob: $("#dob").text(),
            phone: $("#phone").text(),
            city: $("#city").text(),
            state: $("#state").text(),
            graduation: $("#graduation").text()
        },
            function(data, status){
                alert(status);
            });
        });
    });
</script>
</head>



<script>
    function validateReg(){
        let html_collection = document.getElementsByClassName('registration');
        let class_arr = Array.from(html_collection);
        // let xml_str = '?';
        for(let i = 0; i < class_arr.length; i++){
            if (class_arr[i].value == ''){
                document.getElementById('error').innerHTML = "Please fill out all fields";
                return false;
            }
            // xml_str += class_arr[i].getAttribute("name") + '=' + class_arr[i].value + '&';
        }
        // xml_str = xml_str.slice(0,-1);
        // // let formData = new FormData(documnet.getElementById("reg"));
        // let xmlthttp = new XMLHttpRequest();
        // xmlthttp.onreadystatechange = function (){
        //     if(this.readyState == 4 && this.status == 200){
        //         document.getElementById("error").innerHTML = this.responseText
        //     }
        // };
        // xmlthttp.open("GET", "../Registration/registration_validation.php" + xml_str, true);
        // xmlhttp.send();
        return true;
    }
</script>


<body>

    <!-- <script>
        // let class_arr = Array.from(document.getElementsByClassName('registration'));
        // let post_str = '';
        // for (let i = 0; i < class_arr.length; i++){
        //     post_str += class_arr[i].getAttribute("name") + '=' + "'" + class_arr[i].value + "'" + ',';
        // }
        // post_str = post_str.slice(0,-1);
        $("label").click(function(){
            alert('test');
        });
        $("#phone1").click(function(){
        console.log('test');
        $.post("registration_validation.php",
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
            alert(data);
        });
        // return false
        });
    </script> -->

    <h1>Create Account</h1>
    <div id="information_submission">
    <form method="post" action="RegistrationData.php" onsubmit='return validateReg()' name="reg">
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
        <input type="submit" id ="submission_btn" value = "Submit">
    </form>
    </div>
    <button id="check">check</button>
    <p id="error"></p>
    <a href="../Front/front.php">
            <button>Back</button>
    </a>
</body>
</html>