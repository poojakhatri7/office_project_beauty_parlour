<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>
<?php

include 'db_connection.php';
?>
<?php
if (isset($_POST['submit'])) {
    // Get the form data
    $name = $_POST['name'];  
    $comment = $_POST['comment']; 
    // $rating = $_POST['rating'];
    echo $name;
    echo $comment;
    // echo $rating;
    $query = "INSERT INTO reviews values ('','$name','$comment')"; 
    // $query = "INSERT INTO reviews (name, rating, comment,created_at) VALUES ('$name', '$rating','$comment',currenttimestamp())";
    // $query = "INSERT INTO reviews (id,name, rating, comment, created_at) VALUES ('','$name', '$rating', '$comment', currenttimestamp())";

    if(mysqli_query($conn,$query));
    {
   echo"<script> alert('Review added Successfully ') </script>";
    }
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
    <style type="text/css">
.admin_review{
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
            <h4 class="m-0"></h4>
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
    <h3>UPDATE CONTACT US </h3>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">MOBILE NUMBER</label>
    <input type="text" name="mobile_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <label for="exampleInputEmail1" class="form-label">ADDRESS</label>
    <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <label for="exampleInputEmail1" class="form-label">EMAIL US</label>
    <input type="text" name="email_us" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">TIME</label>
    <input type="text" name="time" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="submit"class="btn btn-primary">UPDATE</button>
</form> -->
<div class="card card-info">
              <div class="card-header"style="background-color: rgb(51, 139, 139);">
                <h3 class="card-title">Add Comments and Reviews</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method= "post">
                <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-4">
                      <input type="text"name="name" class="form-control" id="inputEmail3" placeholder="Enter name of the customer">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="comment" class="col-sm-2 col-form-label">Comment</label>
                    <div class="col-sm-4">
                      <textarea name="comment" class="form-control" id="inputEmail3" placeholder=""> </textarea>
                    </div>
                  </div>
                  <!-- <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Rating</label>
                    <div class="col-sm-10">
<select id="rating" name = "rating">
<option value="0">Select </option>
    <option value="1">(1 Stars)</option>
    <option value="2">(2 Stars)</option>
    <option value="3"> (3 Stars)</option>
    <option value="4"> (4 Stars)</option>
    <option value="5"> (5 Star)</option>
</select>

                    
                  </div> -->
                 
                
                  <!-- <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">TIME</label>
                    <div class="col-sm-10">
                      <input type="time" name="time" class="form-control" id="inputPassword3" placeholder="Enter Time ">
                    </div>
                  </div> -->
                  <!-- <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                      </div>
                    </div>
                  </div> -->
                <!-- </div> -->
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" name="submit" class="btn btn-info">UPDATE</button> -->
                  <button type="submit" name="submit" class="btn" style="background-color: rgb(51, 139, 139); color: rgb(244, 247, 230);; font-weight: 500; font-size: 16px;  padding: 7px 15px; ">Add Review</button>
                  <button type="submit" class="btn btn-default float-right">CANCEL</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
</div>
</body>
</html>
<?php
include('includes/footer.php');
?>

