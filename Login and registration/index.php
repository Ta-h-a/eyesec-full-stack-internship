<?php
session_start();

$name = $_SESSION['name'];
$contact = $_SESSION['contact'];
$email = $_SESSION['email'];
$regNo = $_SESSION['regNo'];

if (!isset($name) || !isset($contact) || !isset($email)) {
    header('location:login.php');
    exit; // Add this to prevent further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #343a40;
        }

        h1, h2, h3, h4, h5, h6, p {
            color: #fff;
        }
    </style>
    
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-3">Dashboard :</h2>

    <br>
    <br>

    <h2 class="mb-3">Welcome <?php echo $name ?></h2>

    <p>Here are your Details:</p>

    <div class="table-responsive rounded">
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Register No</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $name ?></td>
                <td><?php echo $contact ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $regNo ?></td>
            </tr>
        </tbody>
    </table>
</div>


    <a href="delete.php" class="btn btn-danger">Delete your account</a>
    <a href="logout.php" class="btn btn-secondary">Log out</a>
</div>

</body>
</html>
