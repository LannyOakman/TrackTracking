<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Team</title>
    <link rel="stylesheet" href="../Registration/styles.css">
    <script>
        function validate(){
            let u_name = document.forms["teamform"]["coach_name"].value;
            let t_name = document.forms["teamform"]["team_name"].value;
            let city = document.forms["teamform"]["city"].value;
            let state = document.forms["teamform"]["state"].value;

            if (u_name =="" || t_name == "" || city == "" || state == ""){
                document.getElementById("error").innerHTML = "Please fill out all fields";
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Create a Team</h1>
        <form name="teamform" action="team_populate.php" onsubmit="return validate()" method="post">
        <div id="teamform">
            <input type="text" placeholder="Coach Userame" name="coach_name">
            <input type="text" placeholder="Team Name" name="team_name">
            <input type="text" placeholder="City" name="city">
            <input type="text" placeholder="State" name="state">
            <input type="text" placeholder="Country" name="country">
            <input type="submit" value="Submit">
        </div>
        <p id="error"></p>
        </form>
        <a href="../Registration/registration.php">
            <button>Create account</button>
        </a>

</body>
</html>