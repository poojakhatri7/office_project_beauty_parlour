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
// $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
include 'db_connection.php';
// Check if 'id' parameter is set and is a valid number
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id']; // Cast the id to an integer for safety

    // Prepare the SQL query to delete the record
    $sql1 = "DELETE FROM admin_login_details WHERE id = {$id}";

    // Execute the query and check for success
    if (mysqli_query($conn, $sql1)) {
        // Redirect after successful deletion
        header("Location: /beauty_parlour_management_system/admin2/staff_details.php");
        exit; // Always call exit after a header redirect
    } else {
        // Show detailed error message if the query fails
        echo "Error: " . mysqli_error($conn); // Show MySQL error
    }
} 
?>