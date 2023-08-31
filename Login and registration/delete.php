<?php 

    session_start();

    include_once("db_connection.php");

    if (empty($_GET)){
        $regNo = $_SESSION["regNo"];

        $query = "DELETE FROM students WHERE regNo = '$regNo'";
        $result = mysqli_query($conn, $query);

        // echo $result;
        if ($result == 1){
            echo "Account Deleted Successfully";
        }
        session_unset();
        session_destroy();
    }else{
        // Code to delete records from index.php
    }

    

?>