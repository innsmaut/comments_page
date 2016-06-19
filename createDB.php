<?php
$servername = "localhost";
$username = "username";
$password = "password";
$baseState;

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    // Create database
    $sql = "CREATE DATABASE commentsDB";
    if ($conn->query($sql) === true) {
        global $baseState;
        $baseState = true;
    } else {
        global $baseState;
        $baseState = false;
    } 
} else {
    global $baseState;
    $baseState = true;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
