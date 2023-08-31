<?php


session_start();

include_once("db_connection.php");

$isTrue = isset($_POST['isTrue']) && $_POST['isTrue'] === '1';

if(empty($_GET)){
    $name = $_SESSION['name'];
    $contact = $_SESSION['contact'];
    $email = $_SESSION['email'];
    $regNo = $_SESSION['regNo'];
    $password = $_SESSION['password'];
    
    if (!isset($name) || !isset($contact) || !isset($email)) {
        header('location:login.php');
        exit;
    }

}else{
    $queryCondition = strval($_GET["regNo"]);
    $query = "SELECT * FROM students WHERE regNo = '$queryCondition';";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    $name = $row["username"];
    $contact = $row["contact"];
    $email = $row["email"];
    $regNo = $row["regNo"];
    $password = $row["password"];
    $isTrue = true;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newName = $_POST['name'];
    $newContact = $_POST['contact'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];
    $regNumber = $_POST['regNo'];

    // Update user information in the database
    $updateQuery = "UPDATE students SET username='$newName', contact='$newContact', email='$newEmail', password='$newPassword' WHERE regNo='$regNumber'";
    
    if ($isTrue!=true){
        if (mysqli_query($conn, $updateQuery)) {
            $_SESSION['name'] = $newName;
            $_SESSION['contact'] = $newContact;
            $_SESSION['email'] = $newEmail;
            header("location: index.php"); // Redirect to dashboard or appropriate page
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }else{
        // echo "<script>alert('Hello world')</script>";
        if (mysqli_query($conn, $updateQuery)) {
            header("location:index.php");
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
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
    <style>
        body {
            background-color: #343a40;
        }

        h1, h2, h3, h4, h5, h6, label {
            color: #fff;
        }

    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-3">Update Profile</h2>

    <form action="update.php" method="POST">
    <input type="hidden" name="isTrue" value="<?php echo $isTrue ? '1' : '0'; ?>">
        <input type="hidden" name="regNo" value="<?php echo $regNo ?>">
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
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>
