<?php
include 'session.php';

include 'db_connection.php';
// Check if 'id' parameter is set and is a valid number
if (isset($_GET['package_number']) && is_numeric($_GET['package_number'])) {
    $package_number = (int)$_GET['package_number']; // Cast the id to an integer for safety

    // Prepare the SQL query to delete the record
    $sql1 = "DELETE FROM package WHERE package_number = {$package_number}";

    // Execute the query and check for success
    if (mysqli_query($conn, $sql1)) {
        // Redirect after successful deletion
        header("Location: /beauty_parlour_management_system/admin2/admin_available_package.php");
        exit; // Always call exit after a header redirect
    } else {
        // Show detailed error message if the query fails
        echo "Error: " . mysqli_error($conn); // Show MySQL error
    }
} 
?>