<!DOCTYPE html>
<?php
    include '../Functions/insertIntoTable.php';
    include '../Other/sql_connection.php';
    
    $user_name = $_POST['username'];
    $user_password = $_POST['password'];
    $name_first = $_POST['name_first'];
    $name_last = $_POST['name_last'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $graduation = $_POST['graduation'];

    //sql statement
    insertIntoTable($conn,'user_details', $user_name,$user_password, $name_first,
                    $name_last, $dob, $phone, $city, $state, $graduation);
    $conn->close();

    header('Location: ../Other/success_page.php');
?>