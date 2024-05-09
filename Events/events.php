<?php Include '../Functions/eventList.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Tracking</title>
    <link rel="stylesheet" href="../Registration/styles.css">
</head>
<body>
    <h1>Event Selection</h1>
    <div id="information_submission">
    <form action="../Times/time_input.php" method="post">
        <?php
            foreach(EVENT_LIST as $event){
                echo("
                <input type='checkbox' name='$event' id='$event' value ='$event'>
                <label for='$event'>$event</label>
                ");}
        ?>
        <input type="submit" id ="submission_btn" value = "Submit">
    </form>
    </div>
    <a href="../team/manage.php">
            <button>Back</button>
    </a>
</body>
</html>