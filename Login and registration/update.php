<?php


session_start();

$name = $_SESSION['name'];
$contact = $_SESSION['contact'];
$email = $_SESSION['email'];
$regNo = $_SESSION['regNo'];

if (!isset($name) || !isset($contact) || !isset($email)) {
    header('location:login.php');
    exit;
}

$servername = "localhost";
$serverUsername = "root";
$userPassword = "";
$database = "class";

$conn = mysqli_connect($servername, $serverUsername, $userPassword, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newName = $_POST['name'];
    $newContact = $_POST['contact'];
    $newEmail = $_POST['email'];
    $password = $_POST['password'];

    // Update user information in the database
    $updateQuery = "UPDATE students SET username='$newName', contact='$newContact', email='$newEmail', password='$password' WHERE regNo='$regNo'";
    
    if (mysqli_query($conn, $updateQuery)) {
        $_SESSION['name'] = $newName;
        $_SESSION['contact'] = $newContact;
        $_SESSION['email'] = $newEmail;
        header("location: index.php"); // Redirect to dashboard or appropriate page
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-3">Update Profile</h2>

    <form action="update.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" required>
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="number" class="form-control" id="contact" name="contact" value="<?php echo $contact ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>
