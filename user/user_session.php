<?php


// php connection

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty";
$port = 3307;
$conn = mysqli_connect($servername, $username, $password, $dbname,$port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



// session code for user 

session_start();
 if (!isset($_SESSION["name"])) {
    header("Location: ../login_page.php");
    exit();
}
?>