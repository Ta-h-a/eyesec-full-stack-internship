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

    // Validating the user

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM students WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)  >0)    
        {
            session_start();
            $row = mysqli_fetch_assoc($result);
            $_SESSION['name'] = $row['username'];
            $_SESSION['contact'] = $row['contact'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['regNo'] = $row['regNo'];


            header("location:index.php");
    }else{
        echo "<script>alert('Username or Password is invalid')</script>";
    }



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Include Bootstrap CSS -->
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
<body>
    <div class="container mt-5">
        <div class="card w-50 mx-auto">
            <div class="card-body">
                <h2 class="card-title">Log in to start your session</h2>
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input required type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input required type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>