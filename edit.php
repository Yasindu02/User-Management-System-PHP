

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Crud Operations</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
   </head>
<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: aqua;">
      <b>Complete Crud Application</b>
   </nav>

   <div class="container">
      <h3><center>Edit User Task</center></h3>

        
<?php
include("db.php");
$id = $_GET['id'];
$sql = "SELECT * FROM `usertask` WHERE `id` = '$id' LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>


      <div class="container d-flex justify-content-center">
         <form action="" method="POST" style="width:50vw; min-width:300px;">
        <input type ="hidden" name="id" value="<?php echo $id; ?>">
        <div class="row">
               <div class="col">
                  <label class="form-label">Title:</label>
                  <input type="text" class="form-control" name="title" placeholder="Enter your title" value="<?php echo $row['title']?>"><br>
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <label class="form-label">Description:</label>
                  <input type="text" class="form-control" name="des" placeholder="Enter your description" value="<?php echo $row['description']?>"><br>
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <label class="form-label">Name:</label>
                  <input type="text" class="form-control" name="role" placeholder="Enter your Role" value="<?php echo $row['role']?>"><br><br>
               </div>
            </div>

            <div class="row">
               <div class="col">
                  <label class="form-label">Start Date:</label>
                  <input type="date" class="form-control" name="startDate"  value="<?php echo $row['dob']?>">
               </div>
               <div class="col">
                  <label class="form-label">End Date:</label>
                  <input type="date" class="form-control" name="endDate"  value="<?php echo $row['enddate']?>"> <br>
               </div>
            </div>

            <div class="col">
               <label class="form-label">Status:</label>
               <select class="form-select" name="status">
                 <option value="ongoing" <?php if ($row['status'] === 'ongoing') echo 'selected'; ?>>Ongoing</option>
                 <option value="pending" <?php if ($row['status'] === 'pending') echo 'selected'; ?>>Pending</option>
                 <option value="Develop" <?php if ($row['status'] === 'Develop') echo 'selected'; ?>>Develop</option>
                 <option value="onhold" <?php if ($row['status'] === 'onhold') echo 'selected'; ?>>On Hold</option>
                 <option value="Completed" <?php if ($row['status'] === 'Completed') echo 'selected'; ?>>Completed</option>
                 <option value="cancel" <?php if ($row['status'] === 'cancel') echo 'selected'; ?>>Cancel</option>
               </select><br>
            </div>

            <div class="col">
               <label class="form-label">Priority:</label>
               <select class="form-select" name="priority">
                 <option value="Low" <?php if ($row['priority'] === 'Low') echo 'selected'; ?>>Low</option>
                 <option value="Medium" <?php if ($row['priority'] === 'Medium') echo 'selected'; ?>>Medium</option>
                 <option value="High" <?php if ($row['priority'] === 'High') echo 'selected'; ?>>High</option>
                 <option value="Major" <?php if ($row['priority'] === 'Major') echo 'selected'; ?>>Major</option>
                 <option value="Lowest" <?php if ($row['priority'] === 'Lowest') echo 'selected'; ?>>Lowest</option>
               </select><br>
            </div>


            <div class="d-grid gap-2 col-4 mx-auto">
               <button class="btn btn-primary" type="submit">Add Task</button><br>
               <a href="index.php" class="btn btn-danger">Display All Task</a>
            </div>
         </form>
      </div>
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




   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


<?php
//session_start();

include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['des']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
    $endDate = mysqli_real_escape_string($conn, $_POST['endDate']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $priority = mysqli_real_escape_string($conn, $_POST['priority']);

    if (!empty($id) && !empty($title) && !empty($description) && !empty($role) && !empty($startDate) && !empty($endDate) && !empty($status) && !empty($priority)) {
        $query = "UPDATE usertask SET title='$title', description='$description', role='$role', dob='$startDate', enddate='$endDate', status='$status', priority='$priority' WHERE id='$id'";

        if (mysqli_query($conn, $query)) {
            //echo "<script type='text/javascript'>alert('Successfully Updated')</script>";
            echo '<script>showSweetAlert("success", "Task Updated Successfully", "index.php");</script>';
            //header("Location: index.php?msg=Record Added New Task successfully");
        } else {
            echo "<script type='text/javascript'>alert('Error: " . mysqli_error($conn) . "')</script>";
        }
    } else {
        //echo "<script type='text/javascript'>alert('Please Enter Valid Information')</script>";
       echo '<script>showSweetAlert("info", "Please fill in all fields with valid data");</script>';
    }
}
?>
  


            
