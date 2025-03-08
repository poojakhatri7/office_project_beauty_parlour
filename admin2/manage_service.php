<?php
 session_start();
 if (!isset($_SESSION["name"])) {
    header("Location: admin_login1.php");
    exit();
}
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>
<?php
include 'db_connection.php';
?>

<main class="app-main">
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style type="text/css">
.manage_services{
  /* background : #157daf !important; */
  background :rgb(33, 70, 77) !important;
}
</style>
  </head>
  <body>
 
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
      <div class="col-sm-6">
      </div><!-- /.col -->
      <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
      <button class="btn" style="background-color:rgb(51, 139, 139);border: none; cursor: pointer;  padding: 7px 7px;">
    <i class="fa fa-magic" style="margin-right: 2px; color: black; font-size: 14px;"></i>
    <a href="#" class="text-white mx-1" data-toggle="modal" data-target="#modal-default"
       style="text-decoration: none; color: black; font-size: 14px; font-weight: 650;  margin: 4px 2px;">
      Add Services
    </a>
  </button>
</ol>
  </div><!-- /.col -->
        </div><!-- /.row -->
      
     
    </div>
    <div class="container-fluid">
      
<div class="row">
                    <div class="col-sm-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" id="service">
                        <option>Select </option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4 ">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Sub Category</label>
                        <select class="form-control"  id="sub_service">
                        <option>Select </option>
                        </select>
                      </div>
                    </div>

  
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Services</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <!-- <h4 style="color:rgb(1, 12, 6);" >Add New Services </h4> -->
            <form id="serviceForm">
                    <div class="form-group">
                        <label for="serviceName" style="color:rgb(51, 139, 139);" >Service Name</label>
                        <input type="text" name="service_name" class="form-control" id="serviceName" placeholder="Enter service name">
                    </div>
                    <div class="form-group">
                        <label for="servicePrice" style="color:rgb(51, 139, 139);">Price</label>
                        <input type="number" name="service_price" class="form-control" id="servicePrice" placeholder="Enter price">
                    </div>
                    <div id="message"></div>
                    <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" name="submit" id="submitBtn" class="btn btn-secondary">Add</button>
            </div>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

</div>
<!-- <div id="service_table"></div>             -->
                <!-- <h3 class="card-title">Appointment Details</h3> -->
              
     <!-- <div class="card-body">      
    <table id="example1" class="table table-bordered table-striped">
       
    </table>
</div> -->
              <!-- /.card-body -->
     
            <!-- /.card -->
         
          <!-- /.col -->
       
        <!-- /.row -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Our services</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139);">
                  <tr>
                    <th>S no.</th>
                    <th>Service name</th>
                    <th>Service price</th>
                    <th>Service number</th>
                    <th>CSS grade</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td></td>
                    <td>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
</tbody>
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
      
  

  <script>
        $(document).ready(function () {
            $("#submitBtn").click(function (e) {
                e.preventDefault(); // Prevent form submission

                var serviceName = $("#serviceName").val();
                var servicePrice = $("#servicePrice").val();
                $.ajax({
                    type: "POST",
                    url: "add_services.php", // PHP file that will handle the request
                    data: {
                       service_name: serviceName,
                       service_price: servicePrice 
                      },
                    success: function (response) {
                        $("#message").html(response); // Display response message
                       $("#serviceForm")[0].reset(); // Reset form fields
                     $("#serviceForm").trigger("reset");
                    }
                });
            });
        });
    </script>
      <script>
$(document).ready(function() {
    function loadData(request_type, category_id) {
        $.ajax({
            url: "load_service.php",
            type: "POST",
            data : {request_type: request_type, id:category_id},
            
            success: function(data) {
              if(request_type=="sub_service_data")
            {
              $("#sub_service").html(data); // Replace content instead of appending
              // console.log(data);
              // console.log("Sending request_type:", request_type);
              // console.log("Sending id:", category_id);
            }
            else{
              $("#service").html(data); // Replace content instead of appending
              console.log(data);
            }
               
            },
            // error: function(xhr, status, error) {
            //     console.error("Error: " + error); // Log errors if any
            // }
        });
    }

    loadData(); // Call the function after defining it

    $("#service").on("change",function()
  {
    var service = $("#service").val();
    console.log(service);

    if(service != "")
  {
    loadData("sub_service_data", service);
  }
  else{
$("#service").html("");
  }
  })
  $("#sub_service").on("change",function()
  {
    var sub_service = $("#sub_service").val();
    console.log(sub_service);
    // loadData("sub_service_data", service);
     $.ajax({
        url: "load_service.php", // Your PHP file to handle the request
        type: "POST",
        data: { sub_service: sub_service }, // Send sub_service value
        success: function(response) {
            // $("#service").html(response); // Update service section with fetched data
            console.log("Received Data:", response);
            // $("#example1").html(response); 
            var tableContent = $(response).find(".card-body").html(); 

if (tableContent) {
    // $("#example1").html("<table class='table table-bordered table-striped'>" + tableContent + "</table>"); 
    $("#example1").html('<div class="card-body">' + tableContent + '</div>'); 
    
} else {
    console.warn("No table data found in response.");
}
        },
        error: function(xhr, status, error) {
            console.error("Error: " + error); // Log any errors
        }
    });
  })
});
</script>
  </body>
</html>
<?php
include('includes/footer.php');
?>
