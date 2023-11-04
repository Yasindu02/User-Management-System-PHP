<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User CRUD Login Form</title>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

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

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include("db.php");

    $sql = "DELETE FROM `usertask` WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>showSweetAlert("success", "Deleted Successfully", "index.php");</script>';
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
} 

?>
