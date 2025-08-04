<?php
include 'session.php';
include('includes/header.php');
include('includes/top_navbar.php');
include('includes/sidebar.php');
?>
<main class="app-main">
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEAUTY PARLOUR MANAGEMENT SYSTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->

    <style type="text/css">
.admin_enquiry_message{
  /* background : #157daf !important; */
  background :rgb(33, 70, 77) !important;
}
</style>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h5 class="m-0"> APPOINTMENT DETAILS</h5> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
           
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
<div class="card">
              <div class="card-header">
                <h5 class="m-0"> Enquiry Messages </h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead style="background-color: rgb(51, 139, 139) ">
                  <tr>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">S no.</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Name</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Email</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Mobile</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Message</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Date and Time</th>
                      <th style="color: rgb(238, 230, 217); font-weight: 500;">Status</th>
                    <th style="color: rgb(238, 230, 217); font-weight: 500;">Select Enquiry Status</th>
                    <!-- <th>Actions</th> -->
                  </tr>
                  </thead>
                  <tbody>
                  <?php
$sql = "SELECT * FROM enquiry_message order BY id DESC";
$result = mysqli_query($conn, $sql);
$count = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        ?>
        <tr>
            <th scope='row'><?php echo $count; ?></th>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['message']; ?></td>
          
  <td><?php echo date("d-m-Y h:i", strtotime($row['created_at'])); ?></td>
 <td id="status-text-<?php echo $row['id']; ?>"><?php echo $row['status']; ?></td>
            <!-- <td> 
  <a href='/beauty_parlour_management_system/admin2/admin_edit_customer.php?id=<?php echo $row["id"]; ?>'>

    <button style='background-color: rgb(23, 162, 184); color: white; border: none; padding: 5px 10px; '>EDIT</button>
  </a> 
  <a href='/beauty_parlour_management_system/admin2/delete_appointment.php?id=<?php echo $row["id"]; ?>'>
    <button style='background-color: #f44336; color: white; border: none; padding: 5px 10px; '>DELETE</button>
  </a> 
</td> -->
<td>
  <select data-id="<?php echo $row['id']; ?>" class="form-control status-dropdown">
    <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
    <option value="Completed" <?php echo ($row['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
    <option value="Rejected" <?php echo ($row['status'] == 'Rejected') ? 'selected' : ''; ?>>Rejected</option>
  </select>
</td>
        </tr>
        <?php
    }
} 
 else {
    echo "No Enquiry message found";
}
?>

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
document.querySelectorAll('.status-dropdown').forEach(function(select) {
  select.addEventListener('change', function() {
    const id = this.getAttribute('data-id');
    const status = this.value;

    fetch('update_status.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'id=' + id + '&status=' + status
    })
    .then(response => response.text())
    .then(data => {
      if (data.trim() === 'success') {
        alert("Status updated successfully!");
           document.getElementById('status-text-' + id).textContent = status;
      } else {
        alert("Error updating status.");
      }
    });
  });
});
</script>

  
</body>
</html>
</main>
<?php
include('includes/footer.php');
?>
