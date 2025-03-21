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
// $conn = mysqli_connect($servername, $username, $password, $dbname,$port);
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
include 'db_connection.php';
?>
<?php
$defaultImage = "/beauty_parlour_management_system/user/assets/dist/img/dp.webp"; 
$uploadPath = $defaultImage; 
if (isset($_FILES['image'])) {
  // echo "<pre>";
  // print_r($_FILES);
  // echo "</pre>";
  $mobile=   $_SESSION["mobile"];
  $photo = $_FILES["image"]["name"];
  $photo2 = $_FILES["image"]["tmp_name"];
  $uploadPath = "upload-images/" . $photo;

  if (move_uploaded_file($photo2, $uploadPath)) {
      echo "Image uploaded successfully! <br>";
      // $sql = "INSERT INTO users (file) VALUES ('$uploadPath')";
      // $sql = "UPDATE portfolio SET file = '$uploadPath' WHERE mobile = '$mobile'";
      $sql = "INSERT INTO portfolio (file) VALUES ('$uploadPath')";
      if ($conn->query($sql) === TRUE) {
        echo "Image path saved to database!";
      } else {
          echo "Error saving to database: " . $conn->error;
      }
    } else {
      echo "Failed to upload image.";
  } 
}

 ?>
<?php

$updated_name ='';
$name= $_SESSION["name"];
$email=  $_SESSION["email"];
$mobile=   $_SESSION["mobile"];
$address=  $_SESSION["address"];
// if(isset($_POST["submit1"])) {

//   $updated_name = mysqli_real_escape_string($conn, $_POST["name"]);
//   $updated_email = mysqli_real_escape_string($conn, $_POST["email"]);
//   $mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
//   $updated_address = mysqli_real_escape_string($conn, $_POST["address"]);
//   $check_user = "SELECT * FROM users WHERE mobile = '$mobile'";
//   $result_user = mysqli_query($conn, $check_user);

//   if(mysqli_num_rows($result_user) > 0) {
//       // Update the user record (no success/error message)
//       $query2 = "UPDATE users 
//                  SET name='$updated_name', email='$updated_email', address='$updated_address',password='123' 
//                  WHERE mobile='$mobile'";          
//      if (mysqli_query($conn, $query2))
//      {
//       $_SESSION['name'] = $updated_name;
//       echo"<script> alert('Updation successful') </script>";
//      }
//      else
//      {
//       echo "Error inserting record: " . mysqli_error($conn);
//      }
//   }
// }
// ?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
.update_profile{
  background :rgb(33, 70, 77) !important;
}
</style>
  </head>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <h4>Gallery Section</h4>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">    
            <div class="col-md-4">
                <div class="card card-info">
              <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 class="card-title">Update Gallery</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form_1" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
					    <div class="col-12">
        			     <div  style="text-align: center; margin-top:-15px;"><br>
                   <img src="<?php echo $uploadPath; ?>" width="300" height="200" class="img3" id="profile-img-tag" height="240" width="300">
                          </div>
        			   </div>
					      <div class="col-12" align="center">
					          <br/>
						<div class="item form-group">
							<label for="photo">Select Photo<span class="required">*</span>
							</label>
							<div class="col-12 ">
								<input type="file" name="image" id="profile-img" value="" class="form-control">
                <button type="submit" name="submit" class="btn" style="background-color:  rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Upload</button>
							</div>
						</div>
						 </div>
						</div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <!--<button type="submit" name="update_photo" class="btn btn-success">Update</button>-->
                </div>
              </form>
            </div>
            </div>
  </div>
  <div class="container-fluid">
<div class="card">
              <div class="card-header">
                <h5 class="m-0"> Appoitment Details </h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139) ">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">file</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Action</th>
                    <!-- <th>Actions</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  <?php
//   $sql = "SELECT * FROM tb_appointment";
// // Step 3: Execute the query
// $result = mysqli_query($conn, $sql);
// $count = 0;
// // Step 4: Check if the query returned any results
// if (mysqli_num_rows($result) > 0) {
//     // Step 5: Use a while loop to fetch each row of data
//     while ($row = mysqli_fetch_assoc($result)) {
//       $count = $count+1 ;
//       echo"<tr>
//       <th scope='row'>".$count."</th> 
//       <td>".$row['name']."</td>
//       <td>".$row['email']."</td> 
//        <td>".$row['date']."</td> 
//         <td>".$row['prefered_time']."</td> 
//          <td>".$row['appointment_for']."</td>  
//         <td> 
//   <a href='/beauty_parlour_management_system/admin2/admin_edit_customer.php?id={$row["id"]}'>

//     <button style='background-color: rgb(23, 162, 184); color: white; border: none; padding: 5px 10px; cursor: pointer;'>EDIT</button>
//   </a> 
//   <a href='/beauty_parlour_management_system/admin2/delete_appointment.php?id={$row["id"]}'>
//     <button style='background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer;'>DELETE</button>
//   </a> 
// </td>
//  <td>
//   <a href='/beauty_parlour_management_system/admin2/admin_edit_customer.php?id={$row["id"]}'>
//       <i class='fas fa-pencil-alt' style='margin-right: 10px; text-decoration: none; border: none; '></i>
//   </a> 
//   <a href='/beauty_parlour_management_system/admin2/delete_appointment.php?id={$row["id"]}'>
//    <i class='fa fa-trash' style='margin-right: 5px; color: red;text-decoration: none; border: none;'></i>
 
//   </a> 
// </td>
//     </tr>";
$sql = "SELECT * FROM portfolio order BY id DESC";
$result = mysqli_query($conn, $sql);
$count = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        ?>
        <tr>
            <th scope='row'><?php echo $count; ?></th>
            <td><?php echo $row['file']; ?></td>
          
           
            <!-- <td> 
  <a href='/beauty_parlour_management_system/admin2/admin_edit_customer.php?id=<?php echo $row["id"]; ?>'>

    <button style='background-color: rgb(23, 162, 184); color: white; border: none; padding: 5px 10px; '>EDIT</button>
  </a> 
  <a href='/beauty_parlour_management_system/admin2/delete_appointment.php?id=<?php echo $row["id"]; ?>'>
    <button style='background-color: #f44336; color: white; border: none; padding: 5px 10px; '>DELETE</button>
  </a> 
</td> -->
<td>
    <!-- <div style="display: inline-block; margin-right: 20px;">
        <a href='/beauty_parlour_management_system/admin2/admin_edit_customer.php?id=<?php echo $row["id"]; ?>'>
            <i class='fas fa-pencil-alt' style='color:rgb(10, 90, 34);'></i> <!-- Edit icon -->
        <!-- </a> 
    </div> --> 
    <div style="display: inline-block;">
        <a href='/beauty_parlour_management_system/admin2/delete_portfolio.php?id=<?php echo $row["id"]; ?>'>
            <i class='fa fa-trash' style='color: red;'></i> <!-- Trash icon -->
        </a>
    </div>
</td>
        </tr>
        <?php
    }
} 
 else {
    echo "No Appointment found.";
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
<?php
include('includes/footer.php');
?>