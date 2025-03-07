<?php include 'data.php' ?>
 <aside class="main-sidebar sidebar-dark-pink elevation-4">
    <!-- Brand Logo -->
    <a href="index" class="brand-link">
      <img src="<?php echo $brand_logo; ?>" alt="Logo" class="brand-image img-circle elevation-2" style="width: 70px; height: auto; object-fit: contain;  background-color: white;object-position: top; border-radius: 40%">
      <span class="brand-text font-weight-light"><?php echo $brand_name; ?></span>
    </a>
    <!-- Sidebar -->
     <style>
      .sidebar-dark-pink {
    background-color:rgb(38, 107, 107) !important; /* Change this color to your desired pink */
    color: white !important;
}

.sidebar-dark-pink .nav-link {
    color: white !important;
}

.sidebar-dark-pink .nav-link:hover {
    background-color:rgb(33, 70, 77) !important; /* Darker pink on hover */
}
</style>
<?php
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
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          
<?php
 $mobile = $_SESSION["mobile"];
        $sql = "SELECT file FROM users WHERE mobile = '$mobile'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $imagePath = $row['file'] ;
        }
        ?>
          <img src="<?php echo $imagePath; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="text-decoration: none;" > 
            <?php 
// print_r ($_SESSION);
 //echo ucwords($_SESSION["name"]);
 echo '<span style="color:rgb(229, 240, 243); font-weight:500";>' . ucwords($_SESSION["name"]) . "&nbsp;".'</span>'; 

 echo '<span style="color:rgb(229, 240, 243); font-weight:500";>' ."(".($_SESSION["mobile"]) .")". '</span>';
 //(' . $_SESSION["mobile"] . ')
?>
           </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/beauty_parlour_management_system/user/" class="nav-link dashboard1">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="/beauty_parlour_management_system/user/user_services.php" class="nav-link admin_services nav-link manage_services">
            <p><i class="fa fa-magic"></i>
              <p>
                Services
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a> 
</li>
</li> 
<li class="nav-item">
            <a href="#" class=" nav-link user_booking nav-link appointment_history">
            <i class="fa fa-clock"></i>
              <p>
                Appointments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> 
            <ul class="nav nav-treeview">
<li class="nav-item">
            <a href="/beauty_parlour_management_system/user/user_booking.php" class="nav-link add_cutomer nav-link all_appointment nav-link search_appointment">
            <i class="fa fa-clock"></i>
              <p>
               Book an appointment
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a> 
</li>
<li class="nav-item">
            <a href="/beauty_parlour_management_system/user/appointment_history.php" class="nav-link appointment_history nav-link">
            <i class="fa fa-calendar-check"></i>
              <p>
               Appointment History 
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a> 
</li>
</li>
</ul>
<li class="nav-item">
            <a href="/beauty_parlour_management_system/user/user_invoice.php" class="nav-link user_invoice nav-link user_invoice_details ">
            <!-- <i class="fa fa-clock"></i> -->
            <i class="fa fa-file-invoice"></i>
              <p>
                Invoice History
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a> 
</li>
<li class="nav-item">
            <a href="/beauty_parlour_management_system/user/user_booking.php" class="nav-link update_profile nav-link change_password ">
            <!-- <i class="fa fa-cog"></i> -->
            <!-- <i class="fa fa-gear"></i>
            <i class="fa fa-user-cog"></i> -->
            <i class="fa fa-address-card"></i>
              <p>
                Profile Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> 
<ul class="nav nav-treeview">
<li class="nav-item">
            <a href="/beauty_parlour_management_system/user/update_profile.php" class="nav-link update_profile">
            <i class="fas fa-edit"></i>
              <p>
                Update Profile
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a> 
</li>
<li class="nav-item">
            <a href="/beauty_parlour_management_system/user/change_password.php" class="nav-link change_password">
            <!-- <i class="fa fa-cog"></i> -->
            <i class="fas fa-user-edit"></i>
              <p>
                Change Password
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a> 
</li>
</li>
</ul>
          <li class="nav-item">
            <a href="/beauty_parlour_management_system/user/user_logout.php" class="nav-link">
            <i class="fa fa-sign-out-alt "></i>
              <!-- <i class="nav-icon fas fa-copy"></i> -->
              <p>
               Logout
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </aside>
  