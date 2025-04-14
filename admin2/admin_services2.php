<?php
include 'session.php';
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
// Check if form is submitted
// if (isset($_POST["submit"])) {
    // Get the form data
//     $service_name = $_POST["service_name"];
//     $service_price = $_POST["service_price"]; 
//   $service_name = mysqli_real_escape_string($conn, $service_name);
// $service_price = mysqli_real_escape_string($conn, $service_price);
    // SQL query to insert data
    //  $query = "INSERT INTO tb_services (id,service_name, service_price, creation_date) VALUES ('','$service_name', '$service_price',CURRENT_TIMESTAMP())";
    // $query = "INSERT INTO `tb_services` (id, service_name, service_price) VALUES (NULL, '$service_name', '$service_price')";

    // Execute the query and check for success
//     if (mysqli_query($conn, $query)) {
//         echo "<script> alert('Services added successfully'); </script>";
//     } else {
//         echo "<script> alert('Something went wrong'); </script>";
//     }
// }
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $sub_service_id = isset($_POST['sub_service']) ? mysqli_real_escape_string($conn, $_POST['sub_service']) : '';
//   $service_name = mysqli_real_escape_string($conn, $_POST['service_name']);
//   $price = mysqli_real_escape_string($conn, $_POST['price']);
//   $description = mysqli_real_escape_string($conn, $_POST['description']);
//   // Check if sub_service_id is empty
//   if (empty($sub_service_id)) {
//       echo "<script>alert('Please select a sub-service before submitting.'); window.location.href='add_service.php';</script>";
//       exit();
//   }

//   // Insert into all_services table
//   $sql = "INSERT INTO all_services (service_number, all_service, price) VALUES ('$sub_service_id', '$service_name', '$price')";

//   if (mysqli_query($conn, $sql)) {
//       echo "<script>alert('Service added successfully!'); window.location.href='add_service.php';</script>";
//   } else {
//       echo "<script>alert('Error: " . mysqli_error($conn) . "'); </script>";
//   }

//   mysqli_close($conn);
// }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sub_service_id = $_POST['s']; // Gets the selected service ID
  $service_name = mysqli_real_escape_string($conn, $_POST['service_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $sql = "INSERT INTO all_services (a_id, all_service,  price, description , service_number) VALUES ('','$service_name', '$price','$description','$sub_service_id')";

      if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Service added successfully!'); window.location.href='manage_service.php';</script>";
      } else {
          echo "<script>alert('Error: " . mysqli_error($conn) . "'); </script>";
      }
  echo "Selected Sub-Service ID: " . $sub_service_id;
}
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style type="text/css">
.admin_services{
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
            <!-- <h4 class="m-0">Repairing </h4> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <div class="container-fluid">
<div class="card card-info">
              <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 style=" align-items: center" class="card-title">ADD SERVICES</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method= "post">
                <div class="card-body">
                <div class="form-group row">
    <label for="serviceSelect" class="col-sm-2 col-form-label"> CATEGORY</label>
    <div class="col-sm-4">
        <select name="service_name" class="form-control" id="service">
            <option value="">Select category</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="serviceSelect" class="col-sm-2 col-form-label"> SUB CATEGORY</label>
    <div class="col-sm-4">
        <select name="s" class="form-control" id="sub_service">
            <option value="">Select Sub category</option>
        </select>
    </div>
</div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">ENTER SERVICE NAME</label>
                    <div class="col-sm-4">
                      <input type="text" name="service_name" class="form-control" id="inputPassword3" placeholder="Enter New Service">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">ENTER SERVICE PRICE</label>
                    <div class="col-sm-4">
                      <input type="number" name="price" class="form-control" id="inputPassword3" placeholder="Enter Price">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">DESCRIPTION</label>
                    <div class="col-sm-4">
                      <input type="text" name="description" class="form-control" id="inputPassword3" placeholder="Any Description of the service">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn" style="background-color: rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px;  padding: 7px 15px; ">Add</button>
                  <button type="submit" class="btn btn-danger float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
</div>
<!-- <div class="card">
        <div class="card-header">
            <h3 class="card-title">Our Services</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139); color: white;">
                    <tr>
                        <th>S No.</th>
                        <th>Service Name</th>
                        <th>Service Price</th>
                        <th>Service Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td colspan="5" class="text-center">Select a Service and Sub-service  to see details</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div> -->
<script>
$(document).ready(function () {

    // Function to load service categories
    function loadServices() {
        $.ajax({
            url: "load_service.php",
            type: "POST",
            data: { request_type: "service_data" },
            success: function (data) {
                $("#service").html(data);
            }
        });
    }

    // Function to load sub-services based on selected category
    function loadSubServices(service_id) {
        $.ajax({
            url: "load_service.php",
            type: "POST",
            data: { request_type: "sub_service_data", id: service_id },
            success: function (data) {
                $("#sub_service").html(data);
            }
        });
    }

    // Load categories on page load
    loadServices();

    // On change of service category, load corresponding sub-services
    $("#service").on("change", function () {
        var service_id = $(this).val();
        if (service_id !== "") {
            loadSubServices(service_id);
        } else {
            $("#sub_service").html('<option value="">Select Sub-Service</option>');
        }
    });

    // On change of sub-service, load corresponding service details in the table
    $("#sub_service").on("change", function () {
        var sub_service = $(this).val();
        $.ajax({
            url: "load_service.php",
            type: "POST",
            data: { sub_service: sub_service },
            success: function (response) {
                var tableBody = $(response).find("tbody").html();
                if (tableBody) {
                    $("#example1 tbody").html(tableBody);
                } else {
                    $("#example1 tbody").html("<tr><td colspan='5' class='text-center'>No services found.</td></tr>");
                }
            }
        });
    });

});
</script>
</body>
</html>
<?php
include('includes/footer.php');
?>