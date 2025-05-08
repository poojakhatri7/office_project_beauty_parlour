<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>
<?php

include 'db_connection.php';
?>
<main class="app-main">
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
.available_package{
  /* background : #157daf !important; */
  background :rgb(33, 70, 77) !important;
}
</style>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h5 class="m-0">RECENT INVOICE DETAILS</h5> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
          
            <!-- <ol class="breadcrumb float-sm-right">
  <button class="btn" style="background-color: rgb(51, 139, 139);border: none; cursor: pointer;  padding: 7px 7px;" >
    <i class="fa fa-user-plus fa-lg" style="margin-right: 2px; color: black; font-size: 14px;"></i>
    <a href="/beauty_parlour_management_system/admin2/admin_add_customer2.php" 
       style="text-decoration: none; color: white; font-size: 14px; font-weight: 700;  margin: 4px 2px;">
   Add Appointment
    </a>
  </button>
</ol> -->

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
 
  <?php

// ?>
  <!-- </tbody>
</table> -->
<!-- <a href="/beauty_parlour_management_system/sign_up.php">Create a new account</a> -->
<div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Appointment Details</h3> -->
                <h5 class="m-0">Available packages</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <!-- <thead style="background-color:rgb(23, 162, 184); color: white;"> -->
                <thead style="background-color:rgb(51, 139, 139); color: white;">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Package name</th>
                  
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Description</th>
                    <!-- <th style="color: rgb(238, 230, 217); font-weight: 500;">Date</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Time</th>-->
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Actions </th> 
                  </tr>
                  </thead>
                  <tbody>
                  <?php
// $sql ="SELECT DISTINCT package_name, description FROM package " ;
$sql = "SELECT MIN(id) as id, package_name, description, package_number
        FROM package
        GROUP BY package_name, description";

// Step 3: Execute the query
$result = mysqli_query($conn, $sql);
$count = 0;
// Step 4: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    // Step 5: Use a while loop to fetch each row of data
   
    while ($row = mysqli_fetch_assoc($result)) {
      $count = $count+1 ;
      echo "<tr>
      <th scope='row'>" . $count . "</th>
      <td>" . $row['package_name'] . "</td>
      <td>" . $row['description'] . "</td>
      <td>
          <div style='display: inline-block; margin-right: 20px;'>
              <a href='/beauty_parlour_management_system/admin2/edit_available_package.php?id=" . $row["id"] . "'>
                  <i class='fas fa-pencil-alt' style='color: rgb(10, 90, 34);'></i>
              </a>
          </div>
          <div style='display: inline-block;'>
              <a href='/beauty_parlour_management_system/admin2/delete_package.php?package_number=" . $row["package_number"] . "'>
                  <i class='fa fa-trash' style='color: red;'></i>
              </a>
          </div>
      </td>
  </tr>";
  
    }
} else {
    echo "No package found.";
}
?>
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</body>
</html>
</main>
<?php
include('includes/footer.php');
?>