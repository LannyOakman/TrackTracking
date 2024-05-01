<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Tracking</title>
    <link rel="stylesheet" href="../Registration/styles.css">
</head>
<body>
    <div id="information_submission">
    <form action="/registration_form.php" method="post">

        <div id="track">
            <input type="checkbox" name="running_events" id="100m">
            <label for="running_events">100m</label>
            <input type="checkbox" name="running_events" id="200m">
            <label for="running_events">200m</label>
            <input type="checkbox" name="running_events" id="400m">
            <label for="running_events">400m</label>
            <input type="checkbox" name="running_events" id="800m">
            <label for="running_events">800m</label>
            <input type="checkbox" name="running_events" id="1600m">
            <label for="running_events">1600m</label>
            <input type="checkbox" name="running_events" id="3200m">
            <label for="running_events">3200m</label>
        </div>

        <div id="field">
            <input type="checkbox" name="field_events" id="highJump">
            <label for="field_events">High Jump</label>
            <input type="checkbox" name="field_events" id="longJump">
            <label for="field_events">Long Jump</label>
            <input type="checkbox" name="field_events" id="shotput">
            <label for="field_events">Shotput</label>
            <input type="checkbox" name="field_events" id="discus">
            <label for="field_events">Discus</label>
            <input type="checkbox" name="field_events" id="javelin">
            <label for="field_events">Javelin</label>
            <input type="checkbox" name="field_events" id="hammerThrow">
            <label for="field_events">Hammer Throw</label>
        </div>

        <input type="submit" id ="submission_btn" value = "Submit">
    </form>
    </div>

</body>
</html>