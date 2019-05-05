<?php
    $host = "localhost";
    $username = "root";
    $pass = "";
    $db= "fortune_builders";

    $conn = new mysqli($host, $username, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
