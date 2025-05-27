<?php include 'data.php'; 
?>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   
    <a href="index" class="brand-link">
      <img src="<?php echo $brand_logo; ?>" alt="Logo" class="brand-image img-circle elevation-2" style="width: 70px; height: auto; object-fit: contain;  background-color: white;object-position: top; border-radius: 40%">
      <span  class="brand-text font-weight-dark"  style="text-decoration: none;"><?php echo $brand_name; ?> </span>
    </a>
     <!-- Brand Logo -->
     <style>
      .sidebar-dark-primary {
    background-color:rgb(38, 107, 107) !important; 
    color: white !important;
}

.sidebar-dark-primary .nav-link  {
    color: white !important;
}

.sidebar-dark-primary .nav-link:hover {
    background-color:rgb(33, 70, 77) !important; /* Darker pink on hover */
}
</style>
<?php

include '../admin2/db_connection.php';
?> 
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php
 $mobile = $_SESSION["mobile"];
        $sql = "SELECT file FROM admin_login_details WHERE mobile = '$mobile'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $imagePath = $row['file'] ;
        }
        ?>
          <img src="<?php echo $imagePath; ?>" class="img-circle elevation-2" alt="User Image" style="width: 40px; height: 40px; object-fit: cover;" alt="gallery-image">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="text-decoration: none;" > 




          <!-- <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="text-decoration: none;" > -->
            <?php
              // if (session_name() == "admin_session")  
              if ($_SESSION['user_role'] == 1)
              {
          echo '<span style="color:rgb(229, 240, 243); font-weight:500";>' . ucwords($_SESSION["name"]) . "&nbsp;".'</span>';
              }
              else{
                echo '<span style="color:rgb(229, 240, 243); font-weight:500";>' . ucwords($_SESSION["name"]) . "&nbsp;".'</span>';
              }
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
            <a href="/beauty_parlour_management_system/admin2/" class="nav-link dashboard1">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        <?php
      // $role = (int) $_SESSION["role"];
      //  if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1)
      //  {
//$role = $_SESSION["role"];
// if (session_name() == "admin_session") 
// echo $role;
//if ($role == 1)
?>
    <li class="nav-item">
            <a href="/beauty_parlour_management_system/admin2/admin_enquiry_message.php" class="nav-link admin_enquiry_message">
              <!-- <i class="nav-icon fas fa-copy"></i> -->
              <!-- <i class="fa fa-file-invoice"></i> -->
              <i class="fa fa-envelope"></i> 

              <p>
               Enquiry message 
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          </li>


           <li class="nav-item" >
            <a href="#" class="nav-link add_cutomer nav-link all_appointment  search_appointment delete_appointment">
            <i class="fa fa-clock"></i>
              <p>
                Appointments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> 
            <ul class="nav nav-treeview" style="background-color:rgb(47, 131, 131); display:none;">
          <li class="nav-item">
            <a href="/beauty_parlour_management_system/admin2/admin_appointment.php" class="nav-link all_appointment">
              <i class="fa fa-clipboard-list"></i>
              <p>
               All Appointments
              </p>
            </a>
          </li>
    
          <li class="nav-item">
            <a href="/beauty_parlour_management_system/admin2/admin_add_customer2.php"  class="nav-link add_cutomer" >
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <!-- <i class="fas fa-plus"></i> -->
              <i class="fa fa-user"></i>
              <p>
              Add New Appointment 
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="/beauty_parlour_management_system/admin2/search_appointment.php" class="nav-link search_appointment">
              
              <i class="fa fa-search"></i>
              <p>
              Search Appointment
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
</li>
<?php
// if($role==1)
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1)
// if (session_name() == "admin_session") 
{
?>
<li class="nav-item">
            <a href="/beauty_parlour_management_system/admin2/delete_old_records.php" class="nav-link delete_appointment">
              
              <i class="fa fa-trash"></i>
              <p>
              Delete old records 
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
</li>
<?php } ?>
</ul>

         
          <li class="nav-item">
            <a href="#" class="nav-link admin_services nav-link manage_services add_category admin_services">
            <p><i class="fa fa-magic"></i>
              <p>
                Services
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> 
            <ul class="nav nav-treeview" style="background-color:rgb(47, 131, 131); display:none;">
          <!-- <li class="nav-item">
            <a href="/beauty_parlour_management_system/admin2/admin_services.php" class="nav-link admin_services"> -->
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <!-- <i class="fa fa-plus-circle"></i> -->
              <!-- <i class="fa fa-clipboard-list"></i>
              <p>
                Add Services
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="/beauty_parlour_management_system/admin2/manage_service.php" class="nav-link manage_services">
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <i class="fa fa-spa"></i>
              <p>
                Available Services
              </p>
            </a>
            <?php
// if($role==1)
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1)
// if (session_name() == "admin_session") 
{
?>           
            <li class="nav-item">
            <a href="/beauty_parlour_management_system/admin2/admin_services2.php" class="nav-link admin_services">
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <!-- <i class="fa fa-cogs"></i> -->
                 <i class="fa fa-plus-circle"></i> 
              <p>
              Add Services 
              </p>
            </a>
            <li class="nav-item">
            <a href="/beauty_parlour_management_system/admin2/add_category.php" class="nav-link add_category">
              <!-- <i class="nav-icon fas fa-th"></i> -->
              <!-- <i class="fa fa-cogs"></i> -->
                 <!-- <i class="fa fa-plus-circle"></i>  -->
                 <i class="fa fa-plus-circle"></i>
               
              <p>
              Add Category and Sub Category
              </p>
            </a>
            <?php } ?>
            </ul>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link package available_package">
            <p><i class="fa fa-toolbox"></i>
              <p>
                Packages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> 
            <ul class="nav nav-treeview" style="background-color:rgb(47, 131, 131); display:none;">
              <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/admin_add_packages1.php" class="nav-link package">
                  <!-- <i class="fa fa-info-circle"></i> -->
                  <i class="fa fa-plus"></i>
                  <p>Add New Package</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/staff_gallery.php" class="nav-link update_staff"> -->
                  <!-- <i class="fa fa-info-circle"></i> -->
                  <!-- <i class="fa fa-user-plus"></i> -->
                  <!-- <i class="fa fa-image"></i> 
                  <p>Staff Gallery</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/admin_available_package.php" class="nav-link available_package">
                <i class="fa fa-box"></i>
                  <p>Available Packages </p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="/beauty_parlour_management_system/admin2/admin_invoice.php" class="nav-link invoice1">
              <!-- <i class="nav-icon fas fa-copy"></i> -->
              <i class="fa fa-file-invoice"></i>
              <p>
               Invoice
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          </li>
          
          <?php
// if($role==1)
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1)
// if (session_name() == "admin_session") 
{
?>
          <li class="nav-item">
            <a href="/beauty_parlour_management_system/admin2/total_registration.php" class="nav-link total_registration">
              <!-- <i class="fa fa-users"></i> -->
              <i class="fa fa-database"></i>
              <p>
               Total registrations
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
</li>
<?php } ?>
<?php
// if($role==1)
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1)
// if (session_name() == "admin_session") 
{
?>
          <li class="nav-item">
            <a href="#" class="nav-link staff_details ">
              <!-- <i class="nav-icon fas fa-copy"></i> -->
              <!-- <i class="fa fa-file-invoice"></i> -->
              <!-- <i class="fa fa-id-badge"></i> -->
              <i class="fa fa-clipboard"></i>
              <p>
          Staff details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="background-color:rgb(47, 131, 131); display:none;">
              <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/add_new_staff.php" class="nav-link staff_details">
                  <!-- <i class="fa fa-info-circle"></i> -->
                  <i class="fa fa-user-plus"></i>
                  <p>Add New Staff</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/staff_gallery.php" class="nav-link update_staff"> -->
                  <!-- <i class="fa fa-info-circle"></i> -->
                  <!-- <i class="fa fa-user-plus"></i> -->
                  <!-- <i class="fa fa-image"></i> 
                  <p>Staff Gallery</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/staff_details.php" class="nav-link staff">
                <i class="fa fa-address-book"></i>
                  <p>Staff Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link about_us nav-link contact_us admin_review portfolio update_portfolio top_slider staff update_staff">
              <!-- <i class="nav-icon fas fa-chart-pie"></i> -->
              <i class="fa fa-user-cog"></i>
              <p>
                Website Manage
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> 
            <ul class="nav nav-treeview" style="background-color:rgb(47, 131, 131); display:none;">
            <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/top_slider.php" class="nav-link top_slider">
                <i class="fa fa-home"></i>
                  <p>Top slider</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/admin_about_us.php" class="nav-link about_us">
                  <i class="fa fa-info-circle"></i>
                  <p>About us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/admin_contact_us.php" class="nav-link contact_us">
                <i class="fa fa-address-book"></i>
                  <p>Contact us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/portfolio.php" class="nav-link portfolio update_portfolio">
                <!-- <i class="fa fa-address-book"></i> -->
                <!-- <i class="fa fa-briefcase"></i> -->
                <!-- <i class="fa fa-folder-open"></i> -->
                <i class="fa fa-id-card"></i>
                  <p>Update Portfolio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/admin_review.php" class="nav-link admin_review">
                <!-- <i class="fa fa-address-book"></i> -->
                <i class="fa fa-star checked"></i>
                  <p>Comments and review </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/staff_gallery.php" class="nav-link update_staff">
                  <!-- <i class="fa fa-info-circle"></i> -->
                  <!-- <i class="fa fa-user-plus"></i> -->
                  <i class="fa fa-image"></i> 
                  <p>Staff Gallery</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a href="#" class="nav-link update_profile change_password">
              <!-- <i class="fa fa-users"></i> -->
              <i class="fa fa-edit"></i>
              <p>
               Profile Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="background-color:rgb(47, 131, 131); display:none;">
              <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/admin_update_profile.php" class="nav-link update_profile">
                  <i class="fa fa-info-circle"></i>
                  <p>Update profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/beauty_parlour_management_system/admin2/admin_change_password.php"  class="nav-link change_password">
                <i class="fa fa-address-book"></i>
                  <p>Change password</p>
                </a>
              </li>
            </ul>
</li>

          <li class="nav-item">
            <a href="/beauty_parlour_management_system/admin2/admin_logout.php" class="nav-link">
            <i class="fa fa-sign-out-alt "></i>
              <!-- <i class="nav-icon fas fa-copy"></i> -->
              <p>
               Logout
                <!-- <i class="fas fa-angle-left right"></i> -->
               
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  
  </aside>
  