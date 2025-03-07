
<?php
 session_start();
 if (!isset($_SESSION["name"])) {
    header("Location: admin_login1.php");
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty";
$port = 3307;
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if form is submitted
// if (isset($_POST["submit"])) {
//     // Get the form data
//     $service_name = $_POST["service_name"];
//     $service_price = $_POST["service_price"]; 
//   $service_name = mysqli_real_escape_string($conn, $service_name);
// $service_price = mysqli_real_escape_string($conn, $service_price);
    // SQL query to insert data
    //  $query = "INSERT INTO tb_services (id,service_name, service_price, creation_date) VALUES ('','$service_name', '$service_price',CURRENT_TIMESTAMP())";
    // $query = "INSERT INTO `tb_services` (id, service_name, service_price) VALUES (NULL, '$service_name', '$service_price')";

    // Execute the query and check for success
    // if (mysqli_query($conn, $query)) {
      //  echo "<script> alert('Appointment done'); </script>";
      // echo json_encode(["status" => "success", "message" => "Service added successfully!"]);
    
    // } else {
       // echo "<script> alert('Something went wrong'); </script>";
//        echo json_encode(["status" => "error", "message" => "Something went wrong: " . mysqli_error($conn)]);
//     }
// }
// ?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['service_name']) && isset($_POST['service_price'])) {
    $service_name = $conn->real_escape_string($_POST['service_name']);
    $service_price = $conn->real_escape_string($_POST['service_price']);

    // $query = "INSERT INTO tb_services (service_name, service_price) VALUES ('$service_name', '$service_price')";
    

    $checkQuery = "SELECT * FROM tb_services WHERE service_name = '$service_name'";
$result = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($result) > 0) {
    // Update existing service
    $query = "UPDATE tb_services SET service_price = '$service_price' WHERE service_name = '$service_name'";
    if(mysqli_query($conn, $query));
    {
      echo "<span style='color: green;'>Service updated successfully!</span>";
      // echo"<script> alert('Appointment successful') </script>";
    }
} else {
    // Insert new service
    $query = "INSERT INTO tb_services (service_name, service_price) VALUES ('$service_name', '$service_price')";
    if(mysqli_query($conn, $query));
    {
      echo "<span style='color:rgb(51, 139, 139)'>Service added successfully!</span>";
      // echo"<script> alert('Appointment successful') </script>";
    } 
}
}
$conn->close();
?>
