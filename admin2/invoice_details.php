<?php
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
       $appointment_id = $_GET ['appointment_id'];
if (isset($_GET['appointment_id'])) {
    // Retrieve and echo the value of 'appointment_id' from the URL
    echo "Appointment ID: " . $_GET['appointment_id'];
} else {
    echo "No appointment ID passed in the URL.";
  
}
// $sql="SELECT DISTINCT p.id AS appointment_id, p.name, p.date
// FROM tb_appointment p
// INNER JOIN tb_selected_services c
// ON p.id = c.appointment_id WHERE appointment_id={$appointment_id}"
//$sql = "SELECT * FROM tb_appointment WHERE id={$appointment_id}";
//$sql1 = "SELECT * FROM tb_selected_services WHERE id={$appointment_id}";
// Step 3: Execute the query
//$result = mysqli_query($conn, $sql);
// $sql="SELECT DISTINCT p.id AS appointment_id, p.name, p.date, p.mobile, p.email
//                 FROM tb_appointment p
//                 INNER JOIN tb_selected_services c ON p.id = c.appointment_id,
//                 WHERE p.id = '{$appointment_id}'";
$sql = "SELECT * FROM tb_appointment WHERE id={$appointment_id}";
$result = mysqli_query($conn, $sql);
// Step 4: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
  // Step 5: Use a while loop to fetch each row of data
  while ($row = mysqli_fetch_assoc($result)) {
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
.invoice{
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
            <h1 class="m-0">YOUR INVOICE DETAILS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/admin2/admin_add_customer.php">ADD NEW CUSTOMER</a></li> -->
              <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
     <div class="container-fluid">
    <h2 style="text-align: center;">Invoice Details</h2>

    <table border="1" cellpadding="10" cellspacing="5" align="center" style="width: 80%;">
        <tr>
            <th colspan="2">Customer Details</th>
        </tr>
        <tr>
            <td><strong>Name:</strong></td>
            <td><?php echo $row['name']; ?></td>
        </tr>
        <tr>
            <td><strong>Contact Number:</strong></td>
            <td><?php echo $row['mobile']; ?></td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td><?php echo $row['email']; ?></td>
        </tr>
        <tr>
            <td><strong>Date:</strong></td>
            <td><?php echo $row['date']; ?></td>
        </tr>
    </table>
    <?php
$sql = "SELECT * FROM tb_selected_services WHERE appointment_id={$appointment_id}";
$result = mysqli_query($conn, $sql);
// Check if there are rows
if (mysqli_num_rows($result) > 0) {
    $sno = 1; // Serial number
    $total = 0; // To calculate the total cost

    // Start the table
    echo '<table border="1" cellpadding="10" cellspacing="5" align="center" style="width: 80%;">
            <tr>
                <th>S no</th>
                <th>Service</th>
                <th>Cost</th>
            </tr>';
    
    // Loop through the results
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$sno}</td>
                <td>{$row['service_name']}</td>
                <td>{$row['service_price']}</td>
              </tr>";
        $sno++;
        $total += $row['service_price'];
    }

    // Add the total row
    echo "<tr>
            <td colspan='2' style='text-align: right;'><strong>Total</strong></td>
            <td><strong>{$total}</strong></td>
          </tr>";

    // End the table
    echo '</table>';
} else {
    echo "No records found for appointment ID {$appointment_id}.";
}
?>

               <?php     
              }
              }  ?>
              </div>
              </body>
              </html>
<?php
include('includes/footer.php');
?>