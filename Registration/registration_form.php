<?php
    $servername = "localhost";
    $username = "lanny1";
    $password = "test123";
    $db = 'tracking';
    
    $ID = uniqid();
    $name_first = $_POST['name_first'];
    $name_last = $_POST['name_last'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $graduation = $_POST['graduation'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    

    //Check connection
    if ($conn->connect_error) {
        echo ("Connection failed: " . $conn->connect_error);
    }

    //sql statement
    $sql = "
    INSERT INTO user_details
        (ID, FirstName, LastName, DateOfBirth, PhoneNumber, City, State, GraduationYear)
    VALUES
        ('$ID','$name_first', '$name_last', '$dob', '$phone', '$city', '$state', '$graduation');";

    //check if record was made
    if (mysqli_query($conn, $sql)){
        echo "New record created successfully";
    } else{
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    };

    $conn->close();

    header('Location: http://localhost/test/Track_And_Field/events.php');
?>