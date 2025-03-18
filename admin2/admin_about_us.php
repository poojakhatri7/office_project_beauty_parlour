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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty";
$port = 3307;
$conn = mysqli_connect($servername, $username, $password, $dbname,$port);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php

if (isset($_POST['submit'])) {
    // Get the form data
    // $page_title = $_POST['page_title'];  // 'page_title' is used for title input
    // $page_description = $_POST['page_description'];  // 'page_description' is used for description input
    $page_title = mysqli_real_escape_string($conn, $_POST['page_title']);
    $heading = mysqli_real_escape_string($conn, $_POST['heading']);
    $text_area = mysqli_real_escape_string($conn, $_POST['text_area']);
   
    // SQL query to update the data (Not safe - vulnerable to SQL injection)
    $query = "UPDATE tb_about_us SET page_title = '$page_title', heading = '$heading', text_area = '$text_area' WHERE id = 1";
    mysqli_query($conn,$query);
    echo"<script> alert('updated successful') </script>";
    // Execute the query directly
    // if ($conn->query($sql) === TRUE) {
    //     echo "Data updated successfully!";
    // } else {
    //     echo "Error updating data: " . $conn->error;
    // }
}
?>


<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
   <script src = "ckeditor/ckeditor.js"> </script>
  <!-- <script src="admin2/ckeditor/ckeditor.js"></script>  -->
  <!-- <script src="http://localhost/beauty_parlour_management_system/admin2/ckeditor/ckeditor.js"></script> -->
  <style type="text/css">
.about_us{
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
            <h1 class="m-0">About Us</h1>
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
    <!-- <form class ="" action="" method= "post" >
    <h3>UPDATE ABOUT US </h3>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">PAGE TITLE </label>
    <input type="text" name="page_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">PAGE DESCRIPTION</label>
    <textarea name="page_description" class="form-control" id="exampleInputPassword1"> </textarea>
  </div>
  <button type="submit" name="submit"class="btn btn-primary">UPDATE</button>
</form> -->
<div class="card card-info">
              <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 class="card-title">UPDATE ABOUT US</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method= "post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">PAGE TITLE</label>
                    <div class="col-sm-10">
                      <input type="text" name="page_title" class="form-control" id="inputEmail3" placeholder="Enter Page Title">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">HEADING</label>
                    <div class="col-sm-10">
                      <input type="text" name="heading" class="form-control" id="inputEmail3" placeholder="Enter Heading of the Description">
                    </div>
                  </div>
                  <!-- <label for="photo">FIRST IMAGE<span class="required"></span>
							</label>
							<div class="col-12 ">
								<input type="file" name="image" id="profile-img" value="" class="form-control"> -->
                <!-- <br>
                <button type="submit" name="submit" class="btn" style="background-color:  rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Upload</button> -->
							<!-- </div>
              <label for="photo">SECOND IMAGE<span class="required"></span>
							</label>
							<div class="col-12 ">
								<input type="file" name="image" id="profile-img" value="" class="form-control"> -->
                <!-- <br>
                <button type="submit" name="submit" class="btn" style="background-color:  rgb(51, 139, 139); color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px;">Upload</button> -->
							<!-- </div>
              <br> -->
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">PAGE DESCRIPTION</label>
                    <div class="col-sm-10">
                    <textarea name="text_area" id="editor1" class="form-control" placeholder="ENTER PAGE DESCRIPTION"></textarea>
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
                  <!-- <button type="submit" name="submit" class="btn btn-info">Upadte</button> -->
                  <button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139); font-weight: 500; font-size: 16px;  padding: 7px 15px; ">Update</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
</div>
<script> CKEDITOR.replace('editor1');</script>
</body>
</html>
<?php
include('includes/footer.php');
?>





