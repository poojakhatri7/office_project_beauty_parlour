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
// if (isset($_POST['submit']) && isset($_FILES['image']) && isset($_POST['designation']) && isset($_POST['name'])) {
if ( isset($_FILES['image']) && isset($_POST['designation'] ) && isset($_POST['name'])) {
  // echo "<pre>";
  // print_r($_FILES);
  // echo "</pre>";
  $mobile=   $_SESSION["mobile"];
  $photo = $_FILES["image"]["name"];
  $photo2 = $_FILES["image"]["tmp_name"];
  $uploadPath = "upload-images/" . $photo;
  $designation = $_POST['designation'];
  $name = $_POST['name'];
  if (move_uploaded_file($photo2, $uploadPath)) {
      echo "Image uploaded successfully! <br>";
      // $sql = "INSERT INTO users (file) VALUES ('$uploadPath')";
      // $sql = "UPDATE portfolio SET file = '$uploadPath' WHERE mobile = '$mobile'";
    //   $sql = "INSERT INTO staff_gallery (file) VALUES ('$uploadPath')";
    // $sql = "INSERT INTO staff_gallery (file, designation) VALUES ('$uploadPath', '$designation')";
    $sql = "INSERT INTO staff_gallery (name, file, designation) VALUES ('$name', '$uploadPath', '$designation')";
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
?> 

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
          <h4>Update Staff Gallery</h4>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">    
            <div class="col-md-8">
                <div class="card card-info">
              <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 class="card-title">User Profile Photo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form_1" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
					    <div class="col-12">

</div>
<div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Designation</label>
                            <div class="col-sm-10">
                                <input type="text" name="designation" class="form-control" id="name" placeholder="Enter designation" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" >
                            </div>
                        </div>
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
                                <br>
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
            
           

                <div class="card-footer">
                  <!--<button type="submit" name="update" class="btn btn-primary">Update</button>-->
                </div>
              </form>
            </div>
            </div>
            
          </div>
        </div>
     </section>
    
  </div>
<?php
include('includes/footer.php');
?>