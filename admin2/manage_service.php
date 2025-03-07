<?php
 session_start();
 if (!isset($_SESSION["name"])) {
    header("Location: admin_login1.php");
    exit();
}
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>
<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "beauty";
// $port = 3307;
// $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
include 'db_connection.php';
?>
<?php
$sql = "SELECT * FROM tb_services";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style type="text/css">
.manage_services{
  /* background : #157daf !important; */
  background :rgb(33, 70, 77) !important;
}
</style>
  </head>
  <body>
 
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
      
    <!-- <h4>MANAGE SERVICES</h4> -->
  
    <!-- <table class="table table-bordered">
  <thead style="background-color:rgb(23, 162, 184); color: white;">
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">SERVICE NAME</th>
      <th scope="col">SERVICE PRICE</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody> -->
  <?php
//   $sql = "SELECT * FROM tb_services";
// // Step 3: Execute the query
// $result = mysqli_query($conn, $sql);
// $count = 0;
// // Step 4: Check if the query returned any results
// if (mysqli_num_rows($result) > 0) {
//   $count = 0;
//     // Step 5: Use a while loop to fetch each row of data
//     while ($row = mysqli_fetch_assoc($result)) {
//       $count=$count +1;
//       echo"<tr>
//       <th scope='row'>".$count."</th>
//       <td>".$row['service_name']."</td>
//       <td>".$row['service_price']."</td>  
// <td> <a href='/beauty_parlour_management_system/admin2/edit_services.php?id={$row["id"]}'>
//   <button style='background-color:rgb(23, 162, 184); color: white; border: none; padding: 5px 10px; cursor: pointer;'>Edit</button>
// <a href='/beauty_parlour_management_system/admin2/delete_service.php?id={$row["id"]}'>
//  <button style='background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer;'> Delete </button></td>
//     </tr>";
        // // Step 6: Display the data (ID, service name, price, and creation date)
        // echo "ID: " . $row['id'] . "<br>";
        // echo "Service Name: " . $row['service_name'] . "<br>";
        // echo "Service Price: $" . $row['service_price'] . "<br>";
        // echo "Creation Date: " . $row['creation_date'] . "<br><br>";
//     }
// } else {
//     echo "No services found.";
// }
// ?>
<!-- //   </tbody>
// </table>
// </div> -->
<div class="row">
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" id="service">
                        <option>Select </option>
                          <!-- <option>Hair Services</option>
                          <option>Beauty Services</option>
                          <option>Hand & Feet Services</option> -->
                        </select>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4 ">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Sub Category</label>
                        <select class="form-control"  id="sub_service">
                        <option>Select </option>
                          <!-- <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option> -->
                        </select>
                      </div>
                    </div>
<div class="card">
              <div class="card-header">  
              <ol class="breadcrumb float-sm-right">
  <button class="btn" style="background-color:rgb(51, 139, 139);border: none; cursor: pointer;  padding: 7px 7px;">
    <i class="fa fa-magic" style="margin-right: 2px; color: black; font-size: 14px;"></i>
    <a href="#" class="text-white mx-1" data-toggle="modal" data-target="#modal-default"
       style="text-decoration: none; color: black; font-size: 14px; font-weight: 650;  margin: 4px 2px;">
      Add Services
    </a>
  </button>
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Services</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <!-- <h4 style="color:rgb(1, 12, 6);" >Add New Services </h4> -->
            <form id="serviceForm">
                    <div class="form-group">
                        <label for="serviceName" style="color:rgb(51, 139, 139);" >Service Name</label>
                        <input type="text" name="service_name" class="form-control" id="serviceName" placeholder="Enter service name">
                    </div>
                    <div class="form-group">
                        <label for="servicePrice" style="color:rgb(51, 139, 139);">Price</label>
                        <input type="number" name="service_price" class="form-control" id="servicePrice" placeholder="Enter price">
                    </div>
                    <div id="message"></div>
                    <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" name="submit" id="submitBtn" class="btn btn-secondary">Add</button>
            </div>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</ol>

                    
                <!-- <h3 class="card-title">Appointment Details</h3> -->
                <h5 class="m-0">OUR SERVICES </h5>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <!-- <thead style="background-color:rgb(33, 70, 77); color: white;"> -->
                <thead style="background-color: rgb(51, 139, 139) ">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Service name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Service Price </th>
                    <?php
 if($role==1)
{
?>         <th style="color: rgb(238, 230, 217); font-weight: 500;">Actions</th> <?php } ?>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
  $sql = "SELECT * FROM tb_services";
// Step 3: Execute the query
$result = mysqli_query($conn, $sql);
$count = 0;
// Step 4: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
  $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      $count=$count +1;
      ?>
      <tr>
      <th scope='row'><?php echo $count; ?></th>
      <td><?php echo $row['service_name']; ?></td>
      <td><?php echo $row['service_price']; ?>
<!-- <td> <a href='/beauty_parlour_management_system/admin2/edit_services.php?id=<?php echo $row["id"]; ?>'>
  <button style='background-color:rgb(23, 162, 184); color: white; border: none; padding: 5px 10px; cursor: pointer;'>Edit</button>
<a href='/beauty_parlour_management_system/admin2/delete_service.php?id=<?php echo $row["id"]; ?>'>
 <button style='background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer;'> Delete </button></td>
 <td> -->
  <?php
 if($role==1)
{
?>
  <td>
    <div style="display: inline-block; margin-right: 20px;">
        <a href='/beauty_parlour_management_system/admin2/edit_services.php?id=<?php echo $row["id"]; ?>'>
            <i class='fas fa-pencil-alt' style='color:rgb(18, 110, 40);'></i> <!-- Edit icon -->
        </a> 
    </div>
    <div style="display: inline-block;">
        <a href='/beauty_parlour_management_system/admin2/delete_service.php?id=<?php echo $row["id"]; ?>'>
            <i class='fa fa-trash' style='color: red;'></i> <!-- Trash icon -->
        </a>
    </div>
</td>
    </tr>
       <?php } ?>
        <?php
    }
} else {
    echo "No services found.";
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
  <script>
        $(document).ready(function () {
            $("#submitBtn").click(function (e) {
                e.preventDefault(); // Prevent form submission

                var serviceName = $("#serviceName").val();
                var servicePrice = $("#servicePrice").val();
                $.ajax({
                    type: "POST",
                    url: "add_services.php", // PHP file that will handle the request
                    data: {
                       service_name: serviceName,
                       service_price: servicePrice 
                      },
                    success: function (response) {
                        $("#message").html(response); // Display response message
                       $("#serviceForm")[0].reset(); // Reset form fields
                     $("#serviceForm").trigger("reset");
                    }
                });
            });
        });
    </script>
    <!-- <script>
$(document).ready(function()){
function loadData()
{
$.ajax({

  url : "load_service.php",
  type : "POST",
  success : function (data)
  {
    $("#service").append(data);
  }
});
 
loadData();
}
}

      </script> -->
      <script>
$(document).ready(function() {
    function loadData() {
        $.ajax({
            url: "load_service.php",
            type: "POST",
            success: function(data) {
                $("#service").html(data); // Replace content instead of appending
            },
            error: function(xhr, status, error) {
                console.error("Error: " + error); // Log errors if any
            }
        });
    }

    loadData(); // Call the function after defining it
});
</script>
  </body>
</html>
<?php
include('includes/footer.php');
?>
