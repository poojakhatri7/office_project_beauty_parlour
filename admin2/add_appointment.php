<?php
 session_start();
 if (!isset($_SESSION["name"])) {
    header("Location: admin_login1.php");
    exit();
}
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mobile = $_POST['mobile'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $preferd_time = $_POST['time'];
    $appointment_for = "offline booking";
    $query = "INSERT INTO tb_appointment values ('','$name','$email','$mobile','$address','$date','$preferd_time','$appointment_for','')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<span style='color: black; font-weight:650;'>Appointment booked successfully!</span>";
    } else {
        echo "<span style='color: red;'>Failed to book appointment!</span>";
    }
    $check_user = "SELECT * FROM users WHERE mobile = '$mobile'";
    $result_user = mysqli_query($conn, $check_user);
  
    if(mysqli_num_rows($result_user) > 0) {
        // Update the user record (no success/error message)
        $query2 = "UPDATE users 
                   SET name='$name', email='$email', address='$address',password='123' 
                   WHERE mobile='$mobile'";
        mysqli_query($conn, $query2);
    } else {
        // Insert a new user (no success/error message)
        // $query2 = "INSERT INTO users (name, username, password, email, date, address, other_info) 
        //            VALUES ('$name', '$mobile', '$mobile', '$email', '$date', '$address', '')";
        $query2 = "INSERT INTO users values ('','$name','$mobile','$email','$address','','')";
        mysqli_query($conn, $query2);
    }
  }

?>

