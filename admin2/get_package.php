 <?php
// include 'db_connection.php';
// if (isset($_POST['package_number'])) {
//     $package_number = intval($_POST['package_number']);

//     $sql = "SELECT * FROM package WHERE package_number = {$package_number}";
//     $result = mysqli_query($conn, $sql);

//     if ($row = mysqli_fetch_assoc($result)) {
//         // echo json_encode($row);
//    $services = [];
//          while ($s = mysqli_fetch_assoc($service_result)) {
//             $services[] = $s['selected_services'];
//         }
//           echo json_encode([
//             'package_name' => $row['package_name'],
//             'description' => $row['description'],
//             'selected_services' => implode(', ', $services),
//             'price' => $row['price']
//         ]);
//     } else {
//         echo json_encode(['error' => 'Package not found']);
//     }
// } else {
//     echo json_encode(['error' => 'No ID received']);
// }
?> 
<?php
include 'db_connection.php';

if (isset($_POST['package_number'])) {
    $package_number = intval($_POST['package_number']);

    // Step 1: Get the first row to fetch common package details
    $main_sql = "SELECT * FROM package WHERE package_number = {$package_number} LIMIT 1";
    $main_result = mysqli_query($conn, $main_sql);

    if ($row = mysqli_fetch_assoc($main_result)) {
        // Step 2: Get all services for this package_number
        $services = [];
        $service_sql = "SELECT selected_services FROM package WHERE package_number = {$package_number}";
        $service_result = mysqli_query($conn, $service_sql);
        
        while ($s = mysqli_fetch_assoc($service_result)) {
            $services[] = $s['selected_services'];
        }

        echo json_encode([
            'package_name' => $row['package_name'],
            'description' => $row['description'],
            'selected_services' => implode(', ', $services), // All services combined
            'price' => $row['price_after_discount'] // You can change to show total if needed
        ]);
    } else {
        echo json_encode(['error' => 'Package not found']);
    }
} else {
    echo json_encode(['error' => 'No package_number received']);
}
?>


