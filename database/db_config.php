<?php
// db_config.php

$host = "localhost";
$username = "root";
$password = "";
$database = "techfarm_nexus";

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
