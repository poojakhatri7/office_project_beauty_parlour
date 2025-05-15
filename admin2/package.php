<?php
include 'session.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h5 class="m-0">RECENT INVOICE DETAILS</h5> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <?php
 $sql = "SELECT * FROM package Group BY package_number  ";
$result = mysqli_query($conn, $sql);
$count = 0;
 $totalprice = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        $totalprice = $totalprice + $row['price'];
        ?>
<div class="col-md-4 mb-3">
  <div class="card shadow-sm">
    <div class="card-body">
      <h5 class="card-title"><strong>Package name </strong><?php echo $row['package_name']; ?></h5>
      <p class="card-text"><strong>Description: </strong> <?php echo $row['description']; ?></p>
      <p class="card-text"><strong>Services: </strong> Hair, Facial, Makeup</p>
      <p class="card-text"><strong>Total Price: </strong><?php echo $totalprice ?></p>
      <p class="card-text"><strong>Package Discount: </strong><?php echo $row['discount']; ?> </p>
        <p class="card-text"><strong>Total price after discount </strong> ₹1800</p>
      <button class="btn btn-outline-primary select-package" data-id="1">Select</button>
    </div>
  </div>
</div>
<?php } } ?>
      </div>
</body>
</html>
</main>
<?php
include('includes/footer.php');
?>