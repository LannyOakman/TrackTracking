<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Meet</title>
    <link rel="stylesheet" href="../Registration/styles.css">
</head>
<body>
    <h1>Create a Meet</h1>
    <form action="../meet/meet_creation_back.php" method="post">
    <input type="text" placeholder = 'Coach Username' name = 'coach' id="coach">
    <input type="text" placeholder = 'Team Name' name = 'team' id="team">
    <input type="text" placeholder = 'Meet Name' name = 'meet' id="meet">
    <input type="date" placeholder='YYYY-MM-DD'name = 'date' id="date">
    <input type="submit">
    </form>
    <a href="../Front/front.php">
            <button>Back</button>
    </a>
</body>
</html>