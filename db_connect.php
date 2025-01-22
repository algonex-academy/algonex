<?php
$servername = "localhost";  // or your server IP address
$username = "root";         // default username for phpMyAdmin
$password = "";             // default password for phpMyAdmin (if none, leave it empty)
$dbname = "contact_db";     // the name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
