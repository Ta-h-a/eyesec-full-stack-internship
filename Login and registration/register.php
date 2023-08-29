<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
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

    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact =intval( $_POST["contact"]);
    $email = $_POST["email"];
    $regNo = $_POST["regNo"];

    $validationQuery = "SELECT * 
                FROM students
                WHERE username='$username' AND email='$email'";

    $r1 = mysqli_query($conn, $validationQuery);
    
    
    if(mysqli_num_rows($r1)  <= 0)
    {
        $validateRegisterNo = "SELECT * FROM students WHERE regNo='$regNo'";
        $r2 = mysqli_query($conn, $validateRegisterNo);
        if (mysqli_num_rows($r2) <= 0){
            // Creating a new user in the Table
            $query = "INSERT INTO students(regNo,username,password,email,contact)
            VALUES('$regNo','$username','$password','$email','$contact')";

            $result = mysqli_query($conn,$query);
            
            if($result){
                echo 'Registration Successful';
            }else{
                echo 'Error in the query';
            }
        }else{
            echo "Register No ".$regNo." already exists";
        }
    }

    



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40;
        }

        h1, h2, h3, h4, h5, h6 {
            color: #fff;
        }
    </style>
</head>
<body >
    <div class="container mt-5">
        <h1 class="mb-4 ">Register Form</h1>
        <form action="register.php" method="POST">
            <div class="mb-3">
                <input required class="form-control" type="text" name="regNo" placeholder="Enter your register no">
            </div>
            <div class="mb-3">
                <input required class="form-control" name="username" type="text" placeholder="Enter your username">
            </div>
            <div class="mb-3">
                <input required class="form-control" name="password" type="password" placeholder="Enter your password">
            </div>
            <div class="mb-3">
                <input required class="form-control" name="email" type="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <input required class="form-control" name="contact" type="number" placeholder="Enter your contact">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>