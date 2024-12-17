<?php
    $host = "localhost";    // Database host
    $username = "root";     // Database username
    $password = "";         // Database password
    $dbname = "users_management_system_db";       // Database name

    // Connect to the database
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
