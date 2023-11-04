

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Crud login and Register Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body background="signup.jpg">
<div class="signup">
    <h1>Registration Form</h1>

    <form method="POST">
        <label>First Name</label><br>
        <input type="text" class="form-control" placeholder="Enter your name" name="fname" autocomplete="off"><br><br>
        <label>Last Name</label><br>
        <input type="text" class="form-control" placeholder="Enter your Last name" name="lname" autocomplete="off"><br><br>
        <label>Email</label><br>
        <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off"><br><br>
        <label>Mobile number</label><br>
        <input type="text" class="form-control" placeholder="Enter your mobile number" name="mnumber" autocomplete="off"><br><br>
        <label>Password</label><br>
        <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off"><br><br>

        <button type="submit" class="btn btn-primary"><b>Signup</b></button>
    </form>

    <p class="pp">By Clicking the Sign Up button, you agree to our<br>
        <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
    </p>
    <p class = "pp">Already have an Account? <a href="login.php">Login Here</a></p>
</div>
<!-- SweetAlert2 -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <script>
        function showSweetAlert(type, message, redirectUrl = null) {
            Swal.fire({
                icon: type,
                title: message,
            }).then((result) => {
                if (redirectUrl) {
                    window.location.href = redirectUrl;
                }
            });
        }
    </script>
</body>
</html>




<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include("db.php"); // Assuming "db.php" contains your database connection configuration

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $gmail = $_POST['email'];
    $mobilenumber = $_POST['mnumber'];
    $password = $_POST['password'];

    if (!empty($gmail) && !empty($password) && !is_numeric($gmail)) {
        $query = "INSERT INTO form (fname, lname, email, mnumber, password) VALUES ('$firstname', '$lastname', '$gmail', '$mobilenumber', '$password')";

        if (mysqli_query($conn, $query)) {
            echo '<script>showSweetAlert("success", "Registered Successful");</script>';
        } else {
            echo "<script>showSweetAlert('Error: " . mysqli_error($conn) . "')</script>";
        }
    } else {
        echo '<script>showSweetAlert("info", "Please fill in all fields with valid data");</script>';
    }
}
?>