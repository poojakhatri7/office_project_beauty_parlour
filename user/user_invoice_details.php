<?php
session_start();
if (!isset($_SESSION["name"])) {
   header("Location: user_login.php");
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
       $appointment_id = $_GET ['appointment_id'];
if (isset($_GET['appointment_id'])) {
    // Retrieve and echo the value of 'appointment_id' from the URL
    echo "Appointment ID: " . $_GET['appointment_id'];
} else {
    echo "No appointment ID passed in the URL.";
  
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
.user_invoice_details{
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
     <div class="container-fluid">
    <h2 style="text-align: center;">Invoice Details</h2>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice with GST</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
    }
    .invoice-container {
      max-width: 900px;
      margin: 30px auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .invoice-header {
      display: flex;
      justify-content: space-between;
      border-bottom: 2px solid #ddd;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }

    .invoice-header .company-info h2 {
      margin: 0;
      color: #333;
    }

    .invoice-header .company-info p {
      margin: 5px 0;
      color: #666;
    }

    .invoice-header .gst-info {
      text-align: right;
    }

    .invoice-header .gst-info h4 {
      margin: 0;
      color: #333;
    }

    .invoice-header .gst-info p {
      margin: 5px 0;
      color: #666;
    }

    .invoice-details {
      margin-bottom: 20px;
    }

    .invoice-details h3 {
      margin: 0 0 10px;
      color: #555;
    }

    .invoice-details p {
      margin: 0;
      color: #666;
    }

    .invoice-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .invoice-table th, .invoice-table td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }

    .invoice-table th {
      background-color: #f4f4f4;
    }

    .invoice-total {
      text-align: right;
    }

    .invoice-total h3 {
      margin: 0;
      color: #333;
    }

    .footer {
      text-align: center;
      margin-top: 20px;
      color: #888;
      font-size: 14px;
      
    }
    @media print {
      .footer, .footar ,.btn, .breadcrumb , footer {
        display: none;
      }
      body {
        margin: 0;
      }
    }
  </style>
</head>
<body>
  <div class="invoice-container">
    <!-- Header Section -->
     <?php
    $sql = "SELECT * FROM tb_contact_us";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Step 5: Use a while loop to fetch each row of data
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
    <div class="invoice-header">
      <div class="company-info">
      <h3><p><?php echo $brand_name?></p></h3>
      <h6><?php echo strtoupper ( $row['address']); ?></h6>
      <h6><?php echo $row['email_us']; ?></h6>
      <h6>Phone:<?php echo $row['mobile_number']; ?></h6>
      </div>
      <div class="gst-info">
        <!-- <h4>GSTIN: 27XXXXXXXXX1Z5</h4> -->
        <p>Date: <?php echo date("d-M-Y"); ?></p>
        <!-- <p>Invoice #: 2025-0001</p> -->
      </div>
    </div>
        <?php }}?>
    <!-- Billing Details -->
    <?php
    //$sql = "SELECT * FROM tb_contact_us";
    $sql = "SELECT * FROM tb_appointment WHERE id={$appointment_id}";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Step 5: Use a while loop to fetch each row of data
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
    <div class="invoice-details">
      <h3>Billed To:</h3>
      <p><?php echo ucwords ($row['name']); ?></p>
      <p><?php echo $row['address']; ?></p>
      <p><?php echo $row['mobile']; ?></p>
      <p><?php echo $row['email']; ?></p>
    </div>
    <?php }}?>
    <!-- Table Section -->
    <?php
    //$sql = "SELECT * FROM tb_contact_us";
    //$sql = "SELECT * FROM tb_appointment WHERE id={$appointment_id}";
    $sql = "SELECT * FROM tb_selected_services WHERE appointment_id={$appointment_id}";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Step 5: Use a while loop to fetch each row of data
      ?>
    <table class="invoice-table">
      <thead>
        <tr>
        <th>S no.</th>
          <th>Service</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
          <?php 
           $service_name =$row['service_name'];
           $service_price = $row['service_price'];
           $count = $count + 1;
           ?>
           
        <tr> 
        <td><?php echo $count; ?></td>
          <td><?php echo $service_name ?></td>
          <td><?php echo $service_price ?></td>
        </tr>
    <?php
        }
      }
        ?>
        
           </tbody>
           </table>
    <!-- Total Section -->
    <div class="invoice-total">
      <?php 
        $sql = "SELECT totalPrice,discount FROM orders WHERE appointment_id={$appointment_id}";
        if (mysqli_num_rows($result) > 0) {
          $total = 0 ;
          $discount = 0;
          $discount_rupee = 0;
          $roundedBill = 0;
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $total = $row['totalPrice'];
          $discount = $row['discount'];
          }
          $formatted_discount = number_format($discount, 0);
          $discount_rupee = ($total * $discount / 100);
         
          $total_discount = $total - ($total * $discount / 100);
          $gst_total =  $total_discount + ($total_discount * 18 / 100);
      // if($total > 100)
      // $discount = $total*5/100;
      // $total =$total -$total*5/100 ;
$roundedBill = round($gst_total, 0); 
// echo "After 5% discount, the rounded bill amount is: ₹" . $roundedBill;
      ?>
     <h3><strong> Bill amount is    Rs  :  <?php echo  $total ?> </strong></h3>
      <h6><strong> Discount in percent : <?php  echo $formatted_discount ?> % </strong></h6>
      <h6><strong> Discount in Rupees  : <?php echo $discount_rupee ?> </strong></h6>
      <h6><strong> After  discount bill amount is Rs : <?php echo  $total_discount ?> </strong></h6>
      <h6><strong> After adding 18% GST :<?php echo  $gst_total ?> </strong></h6>
      <h6><strong> After  Roundoff bill amount is Rs  : <?php echo  $roundedBill ?> </strong></h6>
    </div>
    <?php
    if (isset($_POST["submit"])) {
     $query = "INSERT INTO bill (Sno,appointment_id,bill_amount, discount_percent, bill_after_discount,adding_gst,round_off_bill) VALUES ('','$appointment_id','$total', '$formatted_discount','$total_discount','$gst_total','$roundedBill')
      ON DUPLICATE KEY UPDATE 
            bill_amount = '$total', 
            discount_percent = '$formatted_discount', 
            bill_after_discount = '$total_discount', 
            adding_gst = '$gst_total', 
            round_off_bill = '$roundedBill'";
    
     mysqli_query($conn, $query);
    
}
?>
   <?php } ?>
   
    <!-- Footer Section -->
    <div class="footer">
      <p>Thanks for coming. We will welcome you again</p>
    </div>
  </div>
  <!-- Print Button -->
  <form method="POST">
  <div class="text-center">
  <button type="submit" name="submit" class="btn btn-info " style="background-color:rgb(51, 139, 139)" onclick="printInvoice()">Print Invoice</button>
    </div>
    </form>
<!-- JavaScript Function -->

  </div>
  </div>
  <script>
    function printInvoice() {
        window.print();
    }
</script>
</body>
</html>
<?php
include('includes/footer.php');
?>


