<!DOCTYPE html>

<?php
    include '../Functions/eventsToHTML.php';
    include '../Functions/eventList.php';
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
            <input type="text" placeholder="Username" name="user">
            <input type="text" placeholder="Password" name="password">  
        </div>
        <div class="eventform">
        <?php
            foreach(EVENT_LIST as $event){
                echo (eventsToHTML($_POST[$event]));
            }
        ?>
        <input type="submit" value="Submit">
    </form>

</body>
</html>