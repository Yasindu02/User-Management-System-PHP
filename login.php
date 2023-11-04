<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User CRUD Login Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body background="signup.jpg">
<div class="login">
    <h1>Login Form</h1>
    <form method="POST">
        <label>Email</label><br>
        <input type="email" name="email" placeholder="Enter your Email" required><br><br>

        <label>Password</label><br>
        <input type="password" name ="password" placeholder="Enter your password" required>
        <button type="submit" class="btn btn-primary"><b>Login</b></button>
    </form>
    <h4>Don't have an account? <a href="signup.php">Sign Up Here</a></h4>
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
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) {
        $query = "SELECT * FROM form WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] == $password) {
                // Login successful
                echo '<script>showSweetAlert("success", "Login Successful", "index.php");</script>';
                exit;
            } else {
                echo '<script>showSweetAlert("error", "Incorrect Email and Password");</script>';
            }
        } else {
            echo '<script>showSweetAlert("error", "User not found");</script>';
        }
    } else {
        echo '<script>showSweetAlert("info", "Please fill in all fields with valid data");</script>';
    }
}
?>
