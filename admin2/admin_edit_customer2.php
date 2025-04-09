<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>
<?php

include 'db_connection.php';
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
$totalAfterDiscount = $_POST['totalAfterDiscount'];
// $billing_number = random_int(100000, 999999);
$prefix = "98";  // Fixed starting digits
$randomNumber = random_int(1000, 9999); // Generate remaining random digits
$billing_number = $prefix . $randomNumber;
// echo $billing_number;
// $N = count($selected_services);
// echo "<div style='text-align: center; font-weight: bold;'>$N</div>";
// echo "<div style='text-align: center; font-weight: bold;'>$discount</div>";
// echo "<div style='text-align: center; font-weight: bold;'>$billing_number</div>";
// echo "<div style='text-align: center; font-weight: bold;'>$totalAfterDiscount</div>";
// echo "<div style='text-align: center; font-weight: bold;'>$selected_services</div>";
// echo "<div style='text-align: center; font-weight: bold;'>" . implode(", ", $selected_services) . "</div>";

//php code
$appointment_id = $_GET['id'];  // Fetch user_id from the GET method
$query1 = "UPDATE `tb_appointment` SET name='$name', email='$email',mobile='$mobile',address='$address' WHERE id=$appointment_id";
$result = mysqli_query($conn, $query1);  
 if (isset($_POST['services']) && !empty($_POST['services'])) {
    $selected_services = $_POST['services']; // Array of selected services
    $N = count($selected_services); // Count number of services
   
    // echo "You selected $N service(s): ";
    for ($i = 0; $i < $N; $i++) {
        $service_name = mysqli_real_escape_string($conn, $selected_services[$i]);
        
        // Fetch service price
        $sql = "SELECT price FROM all_services WHERE all_service = '$service_name'";
        $result = mysqli_query($conn, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $service_price = $row['price'];
           
            $insert_sql = "
            INSERT INTO tb_selected_services (appointment_id, service_name, service_price,billing_number) 
            VALUES ('$appointment_id', '$service_name', '$service_price','$billing_number')";
            if(mysqli_query($conn, $insert_sql));
            {
                echo "<script>
                alert('Invoice generated');
               
                    window.location.href='admin_invoice.php';
            </script>";
            }
           
            // echo "<span>$service_name</span> ";
        } else {
            echo "Service '$service_name' not found in the database.<br>";
        }
    }
} else {
    echo "No services selected.";
}
$sql_insert = "INSERT INTO orders (appointment_id, totalPrice, discount, billing_number, created_at) 
               VALUES ({$appointment_id}, {$totalPrice}, {$discount}, {$billing_number}, CURTIME())";
$result_insert = mysqli_query($conn, $sql_insert);
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
          
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
     <div class="container-fluid">
<div class="card card-info">
<div class="card-header"style="background-color: rgb(51, 139, 139);">
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
                  <h4>CHOOSE YOUR SERVICES</h4>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" id="service">
                        <option>Select Service Category</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4 ">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Sub Category</label>
                        <select class="form-control"  id="sub_service">
                        <option>Select category first </option>
                        </select>
                      </div>
                    </div>
</div>
<div class="card">
        <div class="card-header">
            <h3 class="card-title">Our Services</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139); color: white;">
                    <tr>
                        <th>S No.</th>
                        <th>Service Name</th>
                        <th>Service Price</th>
                        <th>Service Number</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td colspan="5" class="text-center">Select a Service and Sub-service  to see details</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- <script>
document.addEventListener('change', function(event) {
    if (event.target.classList.contains('service-checkbox')) {
        if (event.target.checked) {
            console.log("Selected Service:", event.target.dataset.name);
            console.log("Price:", event.target.dataset.price);
        }
    }
});
</script> -->
<!-- <script>
document.addEventListener('change', function(event) {
    if (event.target.classList.contains('service-checkbox')) {
        updateSelectedServices();
    }
});

function updateSelectedServices() {
    let selectedServices = [];
    document.querySelectorAll('.service-checkbox:checked').forEach(checkbox => {
        selectedServices.push({
            name: checkbox.dataset.name,
            price: checkbox.dataset.price
        });
    });

    let selectedDiv = document.getElementById('selected-services');
    if (selectedServices.length > 0) {
        let html = "<ul>";
        selectedServices.forEach(service => {
            html += `<li>${service.name} - ₹${service.price}</li>`;
        });
        html += "</ul>";
        selectedDiv.innerHTML = html;
    } else {
        selectedDiv.innerHTML = "<p>No services selected.</p>";
    }
}
</script>              -->
<!-- <script>
$(document).on('change', '.service-checkbox', function () {
    var selectedServices = [];
    $(".service-checkbox:checked").each(function () {
        var serviceName = $(this).data("name");
        var servicePrice = $(this).data("price");
        selectedServices.push(serviceName + " - ₹" + servicePrice);
    });

    if (selectedServices.length > 0) {
        $("#selectedServices").html( selectedServices.join("<br>"));
    } else {
        $("#selectedServices").html("");
    }
});
</script> -->
<!-- <script>
$(document).on('change', '.service-checkbox', function () {
    var serviceName = $(this).data("name");
    var servicePrice = $(this).data("price");
    var serviceId = $(this).val(); // Use checkbox value as unique identifier
    var selectedDiv = $("#selectedServices");

    if (this.checked) {
        // Append new service if checked
        selectedDiv.append(`<p id="service-${serviceId}">${serviceName} - ₹${servicePrice}</p>`);
    } else {
        // Remove service if unchecked
        $(`#service-${serviceId}`).remove();
    }
});
</script> -->
<script>
$(document).ready(function () {

    // Function to load service categories
    function loadServices() {
        $.ajax({
            url: "load_appointment_service.php",
            type: "POST",
            data: { request_type: "service_data" },
            success: function (data) {
                $("#service").html(data);
            }
        });
    }

    // Function to load sub-services based on selected category
    function loadSubServices(service_id) {
        $.ajax({
            url: "load_appointment_service.php",
            type: "POST",
            data: { request_type: "sub_service_data", id: service_id },
            success: function (data) {
                $("#sub_service").html(data);
            }
        });
    }

    // Load categories on page load
    loadServices();

    // On change of service category, load corresponding sub-services
    $("#service").on("change", function () {
        var service_id = $(this).val();
        if (service_id !== "") {
            loadSubServices(service_id);
        } else {
            $("#sub_service").html('<option value="">Select Sub-Service</option>');
        }
    });

    // On change of sub-service, load corresponding service details in the table
    $("#sub_service").on("change", function () {
        var sub_service = $(this).val();
        $.ajax({
            url: "load_appointment_service.php",
            type: "POST",
            data: { sub_service: sub_service },
            success: function (response) {
                var tableBody = $(response).find("tbody").html();
                if (tableBody) {
                    $("#example1 tbody").html(tableBody);
                } else {
                    $("#example1 tbody").html("<tr><td colspan='5' class='text-center'>No services found.</td></tr>");
                }
            }
        });
    });

});
</script>
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
<button type="submit" name="submit" class="btn" style="background-color:rgb(51, 139, 139); font-weight: 500; font-size: 16px;  padding: 7px 20px;  color:  rgb(238, 230, 217); font-weight: 500; font-size: 16px; padding: 7px 20px; " ">Book</button>
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
document.addEventListener("DOMContentLoaded", function () {
    const selectedServicesDiv = document.getElementById("selectedServices");
    const totalPriceDiv = document.getElementById("totalPrice");
    const discountInput = document.getElementById("discount");
    const totalAfterDiscountDiv = document.getElementById("totalAfterDiscount");

    const hiddenTotalPriceInput = document.getElementById("hiddenTotalPrice");
    const hiddenDiscountedPriceInput = document.getElementById("hiddenDiscountedPrice");

    function updateSelectedServices() {
        let totalPrice = 0;
        const selectedServiceIds = new Set();

        document.querySelectorAll(".service-checkbox:checked").forEach((checkbox) => {
            const serviceId = checkbox.value;
            const serviceName = checkbox.dataset.name;
            const servicePrice = parseFloat(checkbox.dataset.price);
            let serviceDiv = document.getElementById(`service-${serviceId}`);

            selectedServiceIds.add(serviceId); // Track selected service

            if (!serviceDiv) {
                // Create a container for the selected service
                serviceDiv = document.createElement("div");
                serviceDiv.id = `service-${serviceId}`;
                serviceDiv.style.marginBottom = "5px";

                // Display service name and price
                const serviceText = document.createElement("span");
                serviceText.textContent = `${serviceName} (Rs ${servicePrice.toFixed(2)})`;
                serviceDiv.appendChild(serviceText);

                // Create delete button
                const deleteButton = document.createElement("button");
                deleteButton.innerHTML = '<i class="fas fa-times"></i>';
                deleteButton.style.marginLeft = "10px";
                deleteButton.style.color = "red";
                deleteButton.style.border = "none";
                deleteButton.style.background = "transparent";
                deleteButton.style.cursor = "pointer";
                deleteButton.style.fontSize = "16px";

                // Remove service when delete button is clicked
                deleteButton.addEventListener("click", function () {
                    checkbox.checked = false; // Uncheck the checkbox
                    serviceDiv.remove(); // Remove from UI
                    updateSelectedServices(); // Refresh total price
                });

                serviceDiv.appendChild(deleteButton);
                selectedServicesDiv.appendChild(serviceDiv);
            }

            totalPrice += servicePrice; // Add selected service price
        });

        // Ensure total price only accounts for selected services
        totalPrice = Array.from(selectedServiceIds).reduce((sum, serviceId) => {
            const checkbox = document.querySelector(`.service-checkbox[value="${serviceId}"]`);
            return checkbox ? sum + parseFloat(checkbox.dataset.price) : sum;
        }, 0);

        // Update total price
        totalPriceDiv.textContent = `Total: Rs ${totalPrice.toFixed(2)}`;
        hiddenTotalPriceInput.value = totalPrice.toFixed(2);

        // Update total after discount
        updateTotalAfterDiscount(totalPrice);
    }

    function updateTotalAfterDiscount(totalPrice) {
        const discountValue = parseFloat(discountInput.value) || 0;
        const discountAmount = (totalPrice * discountValue) / 100;
        const finalPrice = totalPrice - discountAmount;

        totalAfterDiscountDiv.textContent = `Total after discount: Rs ${finalPrice.toFixed(2)}`;
        hiddenDiscountedPriceInput.value = finalPrice.toFixed(2);
    }

    // Listen for checkbox changes dynamically
    document.addEventListener("change", function (event) {
        if (event.target.classList.contains("service-checkbox")) {
            updateSelectedServices();
        }
    });

    // Listen for discount input changes
    discountInput.addEventListener("input", function () {
        const totalPrice = parseFloat(hiddenTotalPriceInput.value) || 0;
        updateTotalAfterDiscount(totalPrice);
    });
});
</script>
</body>
</html>
<?php
include('includes/footer.php');
?>