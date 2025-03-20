<?php


// Handle category submission
// if (isset($_POST['add_category'])) {
//     $c_service = $_POST['c_service'];
//     $description = $_POST['c_description'];

//     $query = "INSERT INTO category_service (c_service, description) VALUES ('$c_service', '$description')";
//     mysqli_query($conn, $query);
// }

// // Handle sub-category submission
// if (isset($_POST['add_sub_category'])) {
//     $s_name = $_POST['s_name'];
//     $s_description = $_POST['s_description'];
//     $c_id = $_POST['c_id']; // Selected category

//     $query = "INSERT INTO sub_category_service (s_name, description, sub_service) VALUES ('$s_name', '$s_description', '$c_id')";
//     mysqli_query($conn, $query);
// }

// // Fetch categories for the dropdown
// $category_result = mysqli_query($conn, "SELECT * FROM category_service");
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Services</title>
</head>
<body>

<h2>Add Category</h2>
<form method="POST">
    <input type="text" name="c_service" placeholder="Category Name" required>
    <input type="text" name="c_description" placeholder="Description">
    <button type="submit" name="add_category">Add Category</button>
</form>

<h2>Add Sub-Category</h2>
<form method="POST">
    <input type="text" name="s_name" placeholder="Sub-Category Name" required>
    <input type="text" name="s_description" placeholder="Description">
    <select name="c_id" required>
        <option value="">Select Category</option>
     
    </select>
    <button type="submit" name="add_sub_category">Add Sub-Category</button>
</form>

</body>
</html>
