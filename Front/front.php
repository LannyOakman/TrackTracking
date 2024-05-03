<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Registration/styles.css">
</head>
<body>
    <h1>Track Tracking</h1>
    <h3>Log In</h3>
    
    <form method="post" action="login_verification.php">
        <div id="userpass">
            <input type="text" placeholder="Username" name="user">
            <input type="text" placeholder="Password" name="password">
            <input type="submit" value="Submit">   
        </div>
    </form>
    <a href="../Registration/registration.php">
        <button id="create_account">Create Account</button>
    </a>
</body>
</html>