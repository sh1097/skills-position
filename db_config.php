<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "root123";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
