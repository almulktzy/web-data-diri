<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tugas2web";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Rest of your code for handling the form submission and inserting data

// Close the connection
$conn->close();
?>
