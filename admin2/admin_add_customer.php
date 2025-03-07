<?php
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty";
$port = 3307;

$conn = mysqli_connect($servername, $username, $password, $dbname,$port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// if(isset($_POST["submit"]))
// {
//     // $name = $_POST["name"];
//     // $email =  $_POST["email"]; 
//     // $mobile =  $_POST["mobile"]; 
//     // $address =  $_POST["address"]; 
//     // $date =  $_POST["date"]; 
//     // $preferd_time =  $_POST["time"]; 
//    // $appointment_for = "";
   
//     $name = mysqli_real_escape_string($conn, $_POST["name"]);
//     $email = mysqli_real_escape_string($conn, $_POST["email"]);
//     $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
//     $address = mysqli_real_escape_string($conn, $_POST["address"]);
//     $date = mysqli_real_escape_string($conn, $_POST["date"]);
//     $preferd_time = mysqli_real_escape_string($conn, $_POST["time"]);
//     $appointment_for =  $_POST["appointment_for"]; 
// $query1 = "INSERT INTO tb_appointment values ('','$name','$email','$mobile','$address','$date','$preferd_time','$appointment_for')";
//     mysqli_query($conn,$query1);
//  echo"<script> alert('booking successful') </script>"; 
//  $query2 = "INSERT INTO users values ('','$name','$mobile','$email','$address','')";
//  if(!mysqli_query($conn, $query2)) {
//  echo"Not inserted in users table";
// }
// }
// 
if(isset($_POST["submit"])) {
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
  $address = mysqli_real_escape_string($conn, $_POST["address"]);
  $date = mysqli_real_escape_string($conn, $_POST["date"]);
  $preferd_time = mysqli_real_escape_string($conn, $_POST["time"]);
    $appointment_for = "offline booking";
  // Check if the mobile number exists in tb_appointment
  $check_appointment = "SELECT * FROM tb_appointment WHERE mobile = '$mobile'";
  $result_appointment = mysqli_query($conn, $check_appointment);
  if(mysqli_num_rows($result_appointment) > 0) {
      // Update the appointment record
      $query1 = "UPDATE tb_appointment 
                 SET name='$name', email='$email', address='$address', date='$date', prefered_time='$preferd_time', appointment_for='offline booking' 
                 WHERE mobile='$mobile'";
     if(mysqli_query($conn, $query1))
     {
      echo"<script> alert('Updation successful') </script>";
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
  } else {
      // Insert a new appointment
      // $query1 = "INSERT INTO tb_appointment (name, email, mobile, address, date, preferd_time, appointment_for) 
      //            VALUES ('$name', '$email', '$mobile', '$address', '$date', '$preferd_time', '$appointment_for')";
      $query1 = "INSERT INTO tb_appointment values ('','$name','$email','$mobile','$address','$date','$preferd_time','$appointment_for')";
      if(mysqli_query($conn, $query1))
      {
      echo"<script> alert('Appointment successful') </script>";
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
  }
  $check_user = "SELECT * FROM users WHERE mobile = '$mobile'";
  $result_user = mysqli_query($conn, $check_user);

  if(mysqli_num_rows($result_user) > 0) {
      // Update the user record (no success/error message)
      $query2 = "UPDATE users 
                 SET name='$name', email='$email', address='$address' 
                 WHERE mobile='$mobile'";
      mysqli_query($conn, $query2);
  } else {
      // Insert a new user (no success/error message)
      // $query2 = "INSERT INTO users (name, username, password, email, date, address, other_info) 
      //            VALUES ('$name', '$mobile', '$mobile', '$email', '$date', '$address', '')";
      $query2 = "INSERT INTO users values ('','$name','$mobile','$email','$address','')";
      mysqli_query($conn, $query2);
  }
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
.add_cutomer{
  background : #157daf !important;
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
            <h5 class="m-0">Appointment Booking </h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right"> -->
            <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/admin2/admin_add_customer.php">ADD NEW CUSTOMER</a></li> -->
              <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
    <?php
   $mobile_number= $name = $email = $address = "";
    if(isset($_POST['submit1']))
{ 
$mobile_number=$_POST['mobile'];
$sql = "SELECT * FROM users WHERE mobile = '$mobile_number'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  
  while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $email = $row['email'];
    $address = $row['address'];
?>
<?php
// echo $mobile_number;
// echo $name;
// echo $address;
} } 
else {
  echo "<span style='color: red; font-weight:600;  display:block;'>No Record Found Please Fill Up The Details</span>";
}
}
?>
     <div class="container-fluid">
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">ADD CUSTOMER DETAILS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method= "post">
                <div class="card-body">
                <!-- <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-4">
                      <input type="text" name="mobile" class="form-control" id="inputEmail3" placeholder="Enter Mobile Number Of The Visiting Customer" >
                     <button class = "btn" style='background-color:rgb(23, 162, 184); font-weight: 500; font-size: 16px;  padding: 7px 15px;' type="submit" name="search" >Search</button>
                    </div>
                  </div> -->
                  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">MOBILE NUMBER</label>
    <div class="col-sm-4">
        <input type="text" name="mobile" class="form-control" id="inputEmail3" placeholder="Enter mobile number " value = "<?php echo $mobile_number ?>">
    </div>
    <div class="col-sm-2">
        <button class="btn" name="submit1" style="background-color:rgb(31, 184, 100); font-weight: 500; font-size: 16px; padding: 7px 15px;" type="submit" name="search">Search</button>
    </div>
</div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">NAME</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Enter name " value = "<?php echo $name ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">EMAIL US </label>
                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Enter email " value = "<?php echo $email ?>" >
                    </div>
                  </div>
                  <!-- <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-10">
                      <input type="text" name="mobile" class="form-control" id="inputEmail3" placeholder="Enter Mobile Number Of The Visiting Customer" >
                    </div>
                  </div> -->
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> ADDRESS</label>
                    <div class="col-sm-10">
                      <input type="text"name="address" class="form-control" id="inputEmail3" placeholder="Enter address" value = "<?php echo $address ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">DATE</label>
                    <div class="col-sm-10">
                      <input type="date" name="date" class="form-control" id="inputEmail3" placeholder="Enter Date Of The Visting Customer" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">TIME</label>
                    <div class="col-sm-10">
                      <input type="time"name="time" class="form-control" id="inputEmail3" placeholder="Enter Time Of Visiting">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                      <input type="hidden"name="appointment_for" class="form-control" id="inputEmail3"  value="offline booking">
                    </div>
                  </div>
                  <!-- <input type="hidden" name="appointment_for" value="General Appointment"> -->
                  <div class="card-footer">
  <!-- <button type="submit" name="submit" class="btn btn-info">ADD</button> -->
  <button type="submit" name="submit" class="btn" style="background-color: rgb(40, 182, 69); font-weight: 500; font-size: 16px;  padding: 7px 20px; ">Add</button>
  <button type="submit" class="btn btn-default float-right">Cancel</button>
</div>      
</div>
</div>
<!-- Button section for adding and cancelling -->

</form>       
</body>
</html>
<?php
include('includes/footer.php');
?>