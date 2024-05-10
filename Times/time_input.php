<!DOCTYPE html>

<?php
    include '../Functions/eventsToHTML.php';
    include '../Functions/eventList.php';
    include '../Functions/listMeet.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Times</title>
    <link rel="stylesheet" href="../Registration/styles.css">
</head>
<body>
    <h1>Enter Performance:</h1>
    <form action="time_processing.php" method="post">
        <div class="time_login">
            <input type="text" placeholder="Coach Username" name="coach">
            <input type="text" placeholder="Athlete Username" name="athlete">
            <input type="text" placeholder="Team Name" name="team">
            <select name="events" id="events">
            <?php
                listMeet();
            ?>
            </select>
        </div> 

        <div class="eventform">
        <?php
            foreach(EVENT_LIST as $event){
                echo (eventsToHTML($_POST[$event]));
            }
        ?>
        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="../Events/events.php">
        <button class='back_btn'>Back</button>
    </a>
</body>
</html>