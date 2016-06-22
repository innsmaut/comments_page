<?php
$servername = "localhost";
$username = "username";
$password = "password";
$nameDB = "db0";
$baseState;
$tablename = "table0";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    // Create database
    $sql = "CREATE DATABASE $nameDB";
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

    $conn = new mysqli($servername, $username, $password, $nameDB);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM $tablename";

    if ($conn->query($sql) === false) {

       /* $sql = "CREATE TABLE $tablename( 
        id INT, 
        parid INT, 
        name VARCHAR(255) NOT NULL DEFAULT 'Anonymous', 
        messg VARCHAR(255) NOT NULL DEFAULT '',
        PRIMARY KEY (id),
        FOREIGN KEY (parid)
        REFERENCES $tablename (id)
        ON DELETE CASCADE)";*/
        $sql = "CREATE TABLE $tablename( 
        id INT, 
        parid INT, 
        name VARCHAR(255) NOT NULL DEFAULT 'Anonymous', 
        messg VARCHAR(255) NOT NULL DEFAULT '',
        PRIMARY KEY (id))";
        if ($conn->query($sql) === true) {
        echo "Table created successfully";
        } else {
        echo "Error creating table: " . $conn->error;
        }
    }
}


$conn->close();
?>
