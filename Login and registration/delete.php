<?php 

    session_start();

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

    $regNo = $_SESSION["regNo"];

    $query = "DELETE FROM students WHERE regNo = '$regNo'";
    $result = mysqli_query($conn, $query);

    // echo $result;
    if ($result == 1){
        echo "Account Deleted Successfully";
    }
    session_unset();
    session_destroy();

?>