	
<hr><?php
include './admin2/db_connection.php';
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "beauty";
// $port = 3307;
// $conn = mysqli_connect($servername, $username, $password, $dbname,$port);

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// Fetch business hours
$sql = "SELECT day, TIME_FORMAT(open_time, '%h:%i %p') AS open_time, TIME_FORMAT(close_time, '%h:%i %p') AS close_time FROM business_hours";
$result = mysqli_query($conn, $sql);

$business_hours = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $business_hours[] = $row;
    }
}
$sql = "SELECT * FROM tb_contact_us";
// Step 2: Execute the query
$result = mysqli_query($conn, $sql);
// Step 3: Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    // Step 4: Fetch the data from the database and display it inside the <h1> tag
    while ($row = mysqli_fetch_assoc($result)) {
       
$mobile = $row['mobile_number'];
$address = $row['address'];
$email_us = $row['email_us'];
$time = $row['time'];

    }
} else {
    // If no record is found, display a message
    echo "<p>No record found.</p>";
}

?>
<style>
.footer-address {
    white-space: pre-line; /* Allows line breaks */
	word-wrap: break-word;
}
</style>

		<!-- FOOTER-1
			============================================= -->
			<footer id="footer-3" class="pt-2 footer division">
				<div class="container text-center">


					<!-- FOOTER CONTENT -->
					<div class="row">


						<!-- FOOTER CONTACTS -->
						<div class="col-sm-6 col-lg-4">
							<div class="footer-contacts">
							
								<!-- Title -->
								<h5 class="h5-md">Quick Links</h5>

								<!-- Salon Name -->
								<p><a href="team.php">Artists + Staff</a></p>

								<!-- Address -->
								<p><a href="pricing-1.php">Hair Services</a></p> 
								<p><a href="pricing-2.php">Beauty Services</a></p>
								<p><a href="pricing-3.php">Hands & Feet</a></p>

							</div>	
						</div>	


						<!-- FOOTER CONTACTS -->
						<div class="col-sm-6 col-lg-4">
							<div class="footer-info">
								
								<!-- Title -->
								<h5 class="h5-md">Get in Touch</h5>

								<!-- Phone -->
								<p class="footer-phone"><a href="tel:123456789"><?php echo $mobile; ?></a></p>

								<!-- Email -->
								<p class="footer-email"><a href="mailto:yourdomain@mail.com"><?php echo $email_us ; ?></a></p>
								
								<!-- Address -->
								<p class="footer-address"><?php echo nl2br($address); ?><br>
									</p>

								<!-- List -->
								<ul class="foo-socials ico-20 text-center clearfix">									
									<li><a href="#" class="ico-facebook"><span class="flaticon-facebook"></span></a></li>
									<li><a href="#" class="ico-twitter"><span class="flaticon-twitter"></span></a></li>	
									<li><a href="#" class="ico-youtube"><span class="flaticon-instagram"></span></a></li>
								</ul>

							</div>
						</div>


						<!-- FOOTER CONTACTS -->
						<div class="col-sm-6 col-lg-4">
							<div class="footer-info">
								
								<!-- Title -->
								<h5 class="h5-md">Working Hours</h5>
								<?php
							// Fetch business hours
$sql = "SELECT day, TIME_FORMAT(open_time, '%h:%i %p') AS open_time, TIME_FORMAT(close_time, '%h:%i %p') AS close_time FROM business_hours";
$result1 = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($result1)) {
    echo "<li>" . $row['day'] . ": " . $row['open_time'] . " - " . $row['close_time'] . "</li>";
}
?>
								<!-- Text -->	
								<!-- <p>Mon-Fri: <span>10:00AM - 9:00PM</span></p>
								<p>Saturday: <span>10:00AM - 7:00PM</span></p>
								<p>Sunday: <span>10:00PM - 7:00PM</span></p> -->

							</div>
						</div>


					</div>	  <!-- END FOOTER CONTENT -->


					<hr>	<!-- FOOTER DIVIDER LINE -->


					<!-- FOOTER COPYRIGHT -->
					<div class="bottom-footer">
						<div class="row">
							<div class="col">
								<div class="footer-copyright"><p>&copy; 2025 Demo Studio. All Rights Reserved</p>
								<br>
							<p>Developed by <a href="https://tvssolution.in/">TVS SOLUTION.</a></p>
							</div>
							</div>
						</div>  
					</div>
						<!-- BOTTOM FOOTER -->


				</div>	   <!-- End container -->										
			</footer>
			<?php mysqli_close($conn); // Close database connection ?>
		<!-- END FOOTER-1 -->