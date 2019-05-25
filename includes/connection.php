<?php
$host = "localhost";
$username = "root";
$pass = "root";
$db = "swift";

$conn = new mysqli($host, $username, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
