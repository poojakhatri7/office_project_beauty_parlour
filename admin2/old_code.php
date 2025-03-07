<?php
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty";
$port = 3307;
$conn = mysqli_connect($servername, $username, $password, $dbname,$port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//$id = $_GET ['id'];
$id = $_GET ['id'];
if (isset($_POST["submit"])) {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
$selected_services = $_POST["services"];
$totalPrice = $_POST['totalPrice'];
$discount = $_POST['discount'];
$totalAfterDiscount = $_POST['totalAfterDiscount']; // Discount percentage
//php code
$appointment_id = $_GET['id'];  // Fetch user_id from the GET method
$query1 = "UPDATE `tb_appointment` SET name='$name', email='$email',mobile='$mobile',address='$address' WHERE id=$appointment_id";
$result = mysqli_query($conn, $query1);
    // Check if any services were selected
   if (isset($_POST['services']) && !empty($_POST['services'])) {
    // Sanitize and process form input
    $selected_services = $_POST['services'];
    // Start by removing existing records for this appointment_id
    $delete_sql = "DELETE FROM tb_selected_services WHERE appointment_id = '$appointment_id'";
    if (mysqli_query($conn, $delete_sql)) {
      //  echo "Previous services cleared for appointment ID $appointment_id.<br>";
    } else {
      //  echo "Error clearing previous services: " . mysqli_error($conn) . "<br>";
    }
    // Loop through selected services and insert new data
    foreach ($selected_services as $service_name) {
        // Sanitize service name
        $service_name = mysqli_real_escape_string($conn, $service_name);
        // Get the service details from the database
        $sql = "SELECT service_price FROM tb_services WHERE service_name = '$service_name'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // Fetch the service price
            $row = mysqli_fetch_assoc($result);
            $service_price = $row['service_price'];

            // Insert the new record
            $insert_sql = "
                INSERT INTO tb_selected_services (appointment_id, service_name, service_price) 
                VALUES ('$appointment_id', '$service_name', '$service_price')";
            (mysqli_query($conn, $insert_sql)); 
        } else {
            echo "Service '$service_name' not found in the database.<br>";
        }
    }
} else {
    echo "No services selected.";
}
$sql = "SELECT * FROM orders WHERE appointment_id = {$appointment_id}";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // If record exists, update it
    $sql_update = "UPDATE orders SET totalPrice = {$totalPrice}, discount = {$discount} WHERE appointment_id = {$appointment_id}";
    $result_update = mysqli_query($conn, $sql_update);

    if ($result_update) {
      echo"<script> alert('updated successful') </script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    // If record does not exist, insert a new one
    $sql_insert = "INSERT INTO orders (appointment_id, totalPrice, discount) VALUES ({$appointment_id}, {$totalPrice}, {$discount})";
    $result_insert = mysqli_query($conn, $sql_insert);

    if ($result_insert) {
        echo"<script> alert('updated successful') </script>";
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
}
}
$sql = "SELECT * FROM tb_appointment WHERE id={$id}";
// Step 3: Execute the query
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
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="col-sm-6">
          
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right"> -->
            <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/admin2/admin_add_customer.php">ADD NEW CUSTOMER</a></li> -->
              <!-- <li class="breadcrumb-item"><a href="/beauty_parlour_management_system/">Home</a></li> -->
            <!-- </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
     <div class="container-fluid">
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">EDIT CUSTOMER DETAILS</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method= "post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">NAME</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="ENTER NAME OF THE VISITING CUSTOMER" value = "<?php echo $row['name'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">EMAIL US </label>
                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="ENTER EMAIL OF THE VISITING CUSTOMER" value = "<?php echo $row['email'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">MOBILE NUMBER</label>
                    <div class="col-sm-10">
                      <input type="text" name="mobile" class="form-control" id="inputEmail3" placeholder="ENTER MOBILE NUMBER OF THE VISITING CUSTOMER" value = "<?php echo $row['mobile'] ?>"readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> ADDRESS</label>
                    <div class="col-sm-10">
                      <input type="text"name="address" class="form-control" id="inputEmail3" placeholder="ENTER ADDRESS OF THE VISITING CUSTOMER" value = "<?php echo $row['address'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">TIME</label>
                    <div class="col-sm-10">
                      <input type="text"name="time" class="form-control" id="inputEmail3" placeholder="ENTER VISITING TIME" value = "<?php echo $row['prefered_time'] ?>">
                    </div>
                  </div>
                  <!-- Display selected services -->
  <!-- <h3>Selected Services:</h3>
  <div id="selectedServices"></div>
  <div id="totalPrice" name="totalPrice" style="font-weight: bold; margin-top: 20px;">Total: Rs 0.00</div>
  <div class="form-group">
    <label for="discount" style="display: inline-block; width: 200px;">Enter discount percentage </label>
    <input type="text" id="discount" name="discount" class="form-control d-inline-block" style="width: calc(20% - 100px);">
</div>
<div id="totalAfterDiscount" name="totalAfterDiscount" style="font-weight: bold; margin-top: 20px;">Total after discount: Rs 0.00</div>
  Hidden inputs for storing total and selected services -->

 <!-- <input type="hidden" id="hiddenTotalPrice" name="totalPrice">

    <input type="hidden" id="hiddenDiscountedPrice" name="totalAfterDiscount"> -->
                  <?php
// Modify the SQL query to select both service_name and service_price

$sql = "SELECT service_name, service_price FROM tb_services";
$result = mysqli_query($conn, $sql);
// Start the table
$table = "<table class='table table-bordered'>
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Service Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $service_name = $row["service_name"];
        $service_price = $row["service_price"];
        // Add each service as a table row with checkbox
        $table .= "<tr>
                       
                       <td>" . $service_name . "</td>
                       <td>Rs " . $service_price . "</td> 
                       <td><input type='checkbox' class='service-checkbox' name='services[]' value='" . $service_name . "' data-name='" . $service_name . "' data-price='" . $service_price . "'></td>
                   </tr>";         
    }
    
    // Close the table body
    $table .= "</tbody></table>";
} else {
    $table .= "<tr><td colspan='3'>No services available</td></tr></tbody></table>";
}
?>
<h4>CHOOSE YOUR SERVICES</h4>
<?php echo $table; ?>
<h3>Selected Services:</h3>
  <div id="selectedServices"></div>
  <div id="totalPrice" name="totalPrice" style="font-weight: bold; margin-top: 20px;">Total: Rs 0.00</div>
  <div class="form-group">
    <label for="discount" style="display: inline-block; width: 200px;">Enter discount percentage </label>
    <input type="number"  id="discount" name="discount" class="form-control d-inline-block" style="width: calc(30% - 100px);" placeholder="Enter discount amount">
</div>
<div id="totalAfterDiscount" name="totalAfterDiscount" style="font-weight: bold; margin-top: 20px;">Total after discount: Rs 0.00</div>
 <!-- Hidden inputs for storing total and selected services -->

 <input type="hidden" id="hiddenTotalPrice" name="totalPrice">

    <input type="hidden" id="hiddenDiscountedPrice" name="totalAfterDiscount">
<!-- Button section for adding and cancelling -->
 
<div class="card-footer">
<button type="submit" name="submit" class="btn" style="background-color: rgb(33, 165, 100); font-weight: 500; font-size: 16px;  padding: 7px 20px; ">Book</button>
  <button type="submit" class="btn btn-default float-right">Cancel</button>
</div>
                <!-- /.card-footer -->
              </form>
              <?php     
              }
              }  ?>
            </div>
</div>
<script>
const checkboxes = document.querySelectorAll('.service-checkbox'); // Get all checkboxes
const selectedServicesDiv = document.getElementById('selectedServices'); // Selected services container
const totalPriceDiv = document.getElementById('totalPrice'); // Total price container
const discountInput = document.getElementById('discount'); // Discount input field
const totalAfterDiscountDiv = document.getElementById('totalAfterDiscount'); // Total after discount container

const hiddenTotalPriceInput = document.getElementById('hiddenTotalPrice'); // Hidden total price input
const hiddenDiscountedPriceInput = document.getElementById('hiddenDiscountedPrice'); // Hidden discounted total price input

function updateSelectedServices() {
  // Clear the selected services list and reset total price
  selectedServicesDiv.innerHTML = '';
  let totalPrice = 0;
  
  // Loop through checkboxes to find the checked ones
  checkboxes.forEach((checkbox) => {
    if (checkbox.checked) {
      // Create a container for the selected service
      const serviceDiv = document.createElement('div');
      serviceDiv.style.marginBottom = '5px';

      // Get the service name and price
      const serviceName = checkbox.getAttribute('data-name');
      const servicePrice = parseFloat(checkbox.getAttribute('data-price')); // Convert to number
      
      // Display service name and price
      const serviceText = document.createElement('span');
      serviceText.textContent = `${serviceName} (Rs ${servicePrice})`;
      serviceDiv.appendChild(serviceText);

      // Add the delete button
      const deleteButton = document.createElement('button');
      deleteButton.innerHTML = '<i class="fas fa-times"></i>'; // Optional: Add Font Awesome icon
      deleteButton.style.marginLeft = '10px';
      deleteButton.style.color = 'red';
      deleteButton.style.border = 'none';
      deleteButton.style.background = 'transparent';
      deleteButton.style.cursor = 'pointer';
      deleteButton.style.fontSize = '16px';

      // Remove service on delete button click
      deleteButton.addEventListener('click', () => {
        checkbox.checked = false; // Uncheck the checkbox
        updateSelectedServices(); // Refresh the displayed services
      });

      // Append the delete button to the service container
      serviceDiv.appendChild(deleteButton);

      // Add the service container to the selected services div
      selectedServicesDiv.appendChild(serviceDiv);

      // Add the price of the selected service to the total
      totalPrice += servicePrice;
    }
  });

  // Update total price on the screen
  totalPriceDiv.textContent = `Total: Rs ${totalPrice.toFixed(2)}`;

  // Update hidden total price input field
  hiddenTotalPriceInput.value = totalPrice.toFixed(2);

  // Update total after discount
  updateTotalAfterDiscount(totalPrice);
}

function updateTotalAfterDiscount(totalPrice) {
  const discountValue = parseFloat(discountInput.value) || 0; // Get the discount percentage, default to 0 if empty
  const discountAmount = (totalPrice * discountValue) / 100; // Calculate discount amount
  const finalPrice = totalPrice - discountAmount; // Calculate the total after discount
  totalAfterDiscountDiv.textContent = `Total after discount: Rs ${finalPrice.toFixed(2)}`;

  // Update hidden discounted price input field
  hiddenDiscountedPriceInput.value = finalPrice.toFixed(2);
}

// Add event listeners to checkboxes
checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('change', updateSelectedServices);
});

// Add event listener to discount input
discountInput.addEventListener('input', () => {
  const totalPriceText = totalPriceDiv.textContent; // Get the total price text
  const totalPrice = parseFloat(totalPriceText.replace('Total: Rs ', '')) || 0; // Extract the numeric value
  updateTotalAfterDiscount(totalPrice); // Update the total after discount
});
</script>
</body>
</html>
<?php
include('includes/footer.php');
?>