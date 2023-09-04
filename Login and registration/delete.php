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
        $queryId = strval(($_GET["regNo"]));
        $query = "DELETE FROM students WHERE regNo = '$queryId';";
        $result = mysqli_query($conn, $query);

        if ($result){
            echo "Accounted Deleted Successfully";
        }else{
            "Error deleting record";
        }
    }

    

?>