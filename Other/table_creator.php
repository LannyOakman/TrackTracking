<?php
    $servername = "localhost";
    $username = "lanny1";
    $password = "test123";
    $db = 'tracking';

    $conn = new mysqli($servername, $username, $password, $db);

    $sql ="
    CREATE TABLE UserDetails (
    Username VARCHAR(30),
    Password VARCHAR(30),
    FirstName VARCHAR(30),
    LastName VARCHAR(30),
    DateOfBirth VARCHAR(30),
    PhoneNumber VARCHAR(30),
    City VARCHAR(30),
    State VARCHAR(30),
    GraduationYear VARCHAR(4)
    );";
    //(Username, Password, FirstName, LastName, DateOfBirth, PhoneNumber, City, State, GraduationYear)
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    $conn -> close();
?>