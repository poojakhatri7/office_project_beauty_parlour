
<?php
 session_start();
 if (!isset($_SESSION["name"])) {
    header("Location: user_login.php");
    exit();
}
 $mobile=   $_SESSION["mobile"];
?>
<?php
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty";
$port = 3307;
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  
}
?>
  <div class="content-wrapper">
  <style type="text/css">
.dashboard1{
  background :rgb(33, 70, 77) !important;
}
</style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">      
<?php 
// print_r ($_SESSION);
// echo $_SESSION["name"];

// echo '<span style="color:rgb(19, 16, 16); font-size: 18px; font-weight: light;">
//         Welcome, ' .ucwords($_SESSION["name"]) .'  
//       </span>';
     
      // echo '<span style="color:rgb(12, 134, 39); font-size: 18px; font-weight: bold;">
      //   Welcome, ' .ucwords($_SESSION["email"]) . '!
      // </span>';
?>
            <h1 class="m-0">Dashboard</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " style= "background-color:rgb(68, 151, 184)">
              <div class="inner">
              <?php $query1=mysqli_query($conn,"Select * from  tb_services");
$total_services=mysqli_num_rows($query1);
?>
                <h3><?php echo $total_services;?></h3>
                <p>TOTAL SERVICES</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/beauty_parlour_management_system/user/user_services.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php $query2=mysqli_query($conn,"Select * from tb_appointment WHERE mobile = '$mobile'");
$totalappointment=mysqli_num_rows($query2);?>
            <div class="small-box " style="background-color:rgb(211, 122, 93)"> 
              <div class="inner">
                <h3><?php echo $totalappointment;?></h3>
                <p>ALL APPOINTMENT</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/beauty_parlour_management_system/user/appointment_history.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php $query4=mysqli_query($conn,"SELECT DISTINCT p.id AS appointment_id, p.name, p.date
FROM tb_appointment p
INNER JOIN tb_selected_services c
ON p.id = c.appointment_id Where mobile = $mobile");
$invoice=mysqli_num_rows($query4);?>
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo $invoice;?></h3>
                <p>Total Invoice</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/beauty_parlour_management_system/user/user_invoice.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
</div>
<?php
include('includes/footer.php');
?>
