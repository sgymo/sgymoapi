<?php

$servername = "localhost";
$username = "id3483218_admin";
$password = "sgymo17*";
$databasename = "a7976620_db1";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 