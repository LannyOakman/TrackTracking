<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../Other/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="form_wrapper">
    <div class="header">
        <h1>Track Tracking</h1>
    </div>    
        <div class = inline_flexbox>
            <a href="../Registration/registration.php">Create Account</a>
            <a href="../team/team_creation.php">Create Team</a>
            <a href="../meet/meet_creation_front.php">Create a Meet</a>
            <a href="../team/manage.php">Manage Team</a>
            <a href="../review_performance/review.php">Review Performance</a>
        </div>

    </div>

    <script>
        $('a').addClass('btn btn-primary');
    </script>
</body>
</html>