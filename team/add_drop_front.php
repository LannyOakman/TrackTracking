<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Registration/styles.css">
    <title>Add and Drop</title>
    <script>
        function validate(){
        let athlete = document.forms["add_drop"]["athlete"].value;
        let coach = document.forms["add_drop"]["coach"].value;
        let team = document.forms["add_drop"]["team"].value;

        if (athlete == "" || coach == "" || team == ""){
            document.getElementById("error").innerHTML = "Please fill out all fields";
            return false;
        }
        return true;
        }
    </script>
</head>
<body>
    <h1>Add and Drop</h1>
    <form action="add_drop_back.php" onsubmit="return validate()" method = "post" name="add_drop">
        <input type="text" placeholder = "Coach Username" name="coach">
        <input type="text" placeholder = "Add/Drop Username" name="athlete">
        <input type="text" placeholder = "Team Name" name="team">
        <div id="member_role">
            <h4>Add/Dropped Member's Role: </h4>
            <label for="coach">Coach:</label>
            <input type="radio" value="coach" name="role" id="coach_r">
            <label for="athlete">Athlete:</label>
            <input type="radio" value="athlete" name="role" id="athlete_r">
        </div>
        <div id="submission">
        <input type="submit" value="add" name = "add">
        <input type="submit" value="drop" name = "drop">         
        </div>
    </form>
    <br>
    <a href="../team/manage.php">
            <button>Back</button>
    </a>
    <p id="error"></p>
</body>
</html>