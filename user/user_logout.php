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
include '../admin2/db_connection.php';
session_start();
session_unset();
session_destroy();
 header("Location: /beauty_parlour_management_system/login_page.php");
//  header("Location: /beauty_parlour_management_system/admin2/admin_login1.php");
?>