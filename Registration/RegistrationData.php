<!DOCTYPE html>
<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $servername = "localhost";
    $username = "lanny1";
    $password = "test123";
    $db = 'tracking';
    
    $user_name = $_POST['username'];
    $user_password = $_POST['password'];
    $name_first = $_POST['name_first'];
    $name_last = $_POST['name_last'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $graduation = $_POST['graduation'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    

    // //Check connection
    if ($conn->connect_error) {
        echo ("Connection failed: " . $conn->connect_error);
    }

    $sql = "
    SELECT
        * From UserDetails
    WHERE
        Username = '$user_name';";

    $result = mysqli_query($conn, $sql);
    $ID_Used = mysqli_num_rows($result);

    if ($ID_Used){
        header('Location: ../Other/error_page.php');
    }
    //sql statement
    $sql = "
    INSERT INTO UserDetails
        (Username, Password, FirstName, LastName, DateOfBirth, PhoneNumber, City, State, GraduationYear)
    VALUES
        ('$user_name', '$user_password', '$name_first', '$name_last', '$dob', '$phone', '$city', '$state', '$graduation');";

    //check if record was made
    if (!(mysqli_query($conn, $sql))){
        echo "Record not Created";
    }

    $conn->close();

    // header('Location: ../Front/front.php');
?>
<h3>Account Created</h3>
<a href="../Front/front.php">
        <button>Log in</button>
</a>
</html>