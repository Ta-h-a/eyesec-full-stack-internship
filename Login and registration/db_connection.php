<?php

$servername = "localhost";
    $serverUsername = "root";
    $userPassword = "";
    $database = "class";

    // Create connection
    $conn = mysqli_connect($servername, $serverUsername, $userPassword, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>