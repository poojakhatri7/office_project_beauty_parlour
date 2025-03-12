<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category & Subcategory</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        function addSubcategoryField() {
            let container = document.getElementById("subcategories-container");
            let inputField = document.createElement("input");
            inputField.type = "text";
            inputField.name = "sub_name[]"; // Array input
            inputField.placeholder = "Enter Subcategory Name";
            inputField.required = true;
            container.appendChild(inputField);
        }
    </script>
</head>
<body>

    <h2>Add Category</h2>
    <form action="insert.php" method="POST">
        <label>Category Name:</label>
        <input type="text" name="c_service" required>
        
        <label>Description:</label>
        <input type="text" name="description" required>

        <button type="submit" name="add_category">
            <i class="fa-solid fa-plus"></i> Add Category
        </button>
    </form>

    <h2>Add Subcategories</h2>
    <form action="insert.php" method="POST">
        <label>Select Category:</label>
        <select name="sub_service" required>
            <?php
            include 'db_connect.php';
            $result = mysqli_query($conn, "SELECT * FROM category");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['c_id']}'>{$row['c_service']}</option>";
            }
            ?>
        </select>

        <label>Subcategory Names:</label>
        <div id="subcategories-container">
            <input type="text" name="sub_name[]" placeholder="Enter Subcategory Name" required>
        </div>

        <button type="button" onclick="addSubcategoryField()">
            <i class="fa-solid fa-plus"></i> Add More Subcategories
        </button>

        <button type="submit" name="add_subcategory">
            <i class="fa-solid fa-plus"></i> Save Subcategories
        </button>
    </form>

</body>
</html>
