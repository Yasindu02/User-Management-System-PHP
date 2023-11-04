<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Crud Operations</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

</head>
<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: aqua;">
      <b>Complete Crud Application</b>
   </nav>
   <div class="container">
    <?php
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
   <a href="addtask.php" class="btn btn-danger">Add New Task</a> <br><br>

   <form action="" method="GET">
   <div class="input-group mb-4 d-flex justify-content-between">
    <div class="d-flex flex-column">
        <label class="form-label"><h5><b>Status:</b></h5></label>
        <select class="form-select" name="status">
            <option value="">----Select Status------</option>
            <option value="ongoing">Ongoing</option>
            <option value="pending">Pending</option>
            <option value="Develop">Develop</option>
            <option value="onhold">onhold</option>
            <option value="Completed">Completed</option>
            <option value="cancel">Cancel</option>
        </select>
    </div>
    <div class="d-flex flex-column">
        <label class="form-label">
        <h5><b>Priority:</b></h5></label>
        <select class="form-select" name="priority">
            <option value="">----Select Priority------</option>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
            <option value="Major">Major</option>
            <option value="Lowest">Lowest</option>
        </select>
    </div>
    <div class="col-md-4">
               <label for="daterange" class="form-label"><b><h5>Select Date Range:</h5></b></label>
               <input type="text" id="daterange" name="daterange" class="form-control" value="01/01/2018 - 01/15/2018" readonly>
           </div>
    <!-- <div class="input-group input-daterange">
          <label class="">Select Date Range :</label>
          <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" readonly />
        </div> -->
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
    
   </div>

   </form>

   <table class="table table-hover text-center">
      <thead class="table-dark">
         <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Name</th>
            <th scope="col">start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Status</th>
            <th scope="col">Priority</th>
            <th scope="col">Actions</th>
         </tr>
      </thead>
      <tbody>
        
         <?php
        include("db.php");

        $sql = "SELECT * FROM `usertask` WHERE 1";

        // Status filter
        if (isset($_GET['status']) && !empty($_GET['status'])) {
            $status = $_GET['status'];
            $sql .= " AND `status` = '$status'";
        }

        // Priority filter
        if (isset($_GET['priority']) && !empty($_GET['priority'])) {
            $priority = $_GET['priority'];
            $sql .= " AND `priority` = '$priority'";
        }

        // Start date and end date filters
        
if (isset($_GET['daterange']) && !empty($_GET['daterange'])) {
    list($startDate, $endDate) = explode(" - ", $_GET['daterange']);
    $startDate = date('Y-m-d', strtotime($startDate));
    $endDate = date('Y-m-d', strtotime($endDate));
    $sql .= " AND `dob` BETWEEN '$startDate' AND '$endDate'";
}

       

        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
            <th><?php echo $row['id']?></th>
            <th><?php echo $row['title']?></th>
            <th><?php echo $row['description']?></th>
            <th><?php echo $row['role']?></th>
            <th><?php echo $row['dob']?></th>
            <th><?php echo $row['enddate']?></th>
            <th><?php echo $row['status']?></th>
            <th><?php echo $row['priority']?></th>

            <td>
            <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-primary me-3"><i class="fa-solid fa-pen-to-square fs-5"></i> Edit</a>
            <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="fa-solid fa-trash fs-5"></i> Delete</a>
            </td>

          </tr>
          <?php
        }
        ?>

      </tbody>
    </table>
   </div>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   
 








    <script> 

   $(document).ready(function(){
    
  $(function() {
    $('input[name="daterange"]').daterangepicker({
      "startDate": "01-10-2023",
      "endDate": "17/11/2023",
      opens: 'center',
      locale: {
        format: 'DD-MM-YYYY'
      }
    });
  });
});
</script> 
  
   <!-- Bootstrap -->

   <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
