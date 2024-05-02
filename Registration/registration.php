<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Tracking</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Create Account</h1>
    <div id="information_submission">
    <form method="post" action="RegistrationData.php">
        <label for="username">Username</label>         
        <input type="text" id="username" placeholder="Username" name="username"><br>
        <label for="password">Password</label>       
        <input type="text" id="password" placeholder="Password" name="password"><br>
        <label for="name_first">First Name</label>         
        <input type="text" id="name_first" placeholder="First name" name="name_first"><br>
        <label for="name_last">Last Name</label>       
        <input type="text" id="name_last" placeholder="Last name" name="name_last"><br>
        <label for="dob">Date of Birth</label>
        <input type="text" id="dob" placeholder="MM/DD/YYYY" name="dob"><br>
        <label for="phone">Phone number</label>
        <input type="text" id="phone" placeholder="xxx-xxx-xxxx" name="phone"><br>
        <label for="city">City</label>
        <input type="text" id="city" placeholder="City" name="city"><br>
        <label for="state">State</label>
        <input type="text" id="state" placeholder="state" name="state"><br>
        <label for="graduation">Graduation Year</label>
        <input type="number" id="graduation" placeholder="20XX" name="graduation"><br>
        <input type="submit" id ="submission_btn" value = "Submit">
    </form>
    </div>
</body>
</html>