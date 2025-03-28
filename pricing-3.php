<?php
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
?>
<!doctype html>
<html lang="en">
<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="DSAThemes">	
		<meta name="description" content="Reine - Beauty Salon HTML5 Template">
		<meta name="keywords" content="DSAThemes, Beauty, Salon, Beauty Parlour, Health Care, Makeup, Nail Salon, Therapy, Treatment">
		<meta name="viewport" content="width=device-width, initial-scale=1">
				
  		<!-- SITE TITLE -->
		<title>Demo Beauty Studio</title>
							
		<!-- FAVICON AND TOUCH ICONS -->
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="icon" href="images/apple-touch-icon.png" type="image/x-icon">

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css2?family=Alex+Brush&amp;display=swap" rel="stylesheet">	
		<link href="https://fonts.googleapis.com/css2?family=Vollkorn:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

		<!-- BOOTSTRAP CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
				
		<!-- FONT ICONS -->
		<link href="css/flaticon.css" rel="stylesheet">

		<!-- PLUGINS STYLESHEET -->
		<link href="css/menu.css" rel="stylesheet">	
		<link id="effect" href="css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">
		<link href="css/magnific-popup.css" rel="stylesheet">	
		<link href="css/owl.carousel.min.css" rel="stylesheet">
		<link href="css/owl.theme.default.min.css" rel="stylesheet">
		<link href="css/datetimepicker.min.css" rel="stylesheet">
		<link href="css/lunar.css" rel="stylesheet">

		<!-- ON SCROLL ANIMATION -->
		<link href="css/animate.css" rel="stylesheet">

		<!-- TEMPLATE CSS -->
		<link href="css/style.css" rel="stylesheet"> 
		
		<!-- RESPONSIVE CSS -->
		<link href="css/responsive.css" rel="stylesheet">

	</head>
	<body>

		<!-- PRELOADER SPINNER
		============================================= -->	
		<?php include 'preloader.php'; ?>

		<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page">




			<!-- HEADER
			============================================= -->
			<?php include 'header-2.php'; ?>
			<!-- END HEADER -->




			<!-- TEXT CONTENT
			============================================= -->
			<div class="pt-10 ct-11 content-section">
				<div class="container"><div class="ct-11-wrapper bg--04 bg--fixed"></div></div>
			</div>




			<!-- PRICING-1
			============================================= -->
			<div class="pt-8 pricing-1 pricing-section division">
				<div class="container">
				<?php
								$sql = "Select * from sub_category_service where s_id = 8";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0)
While ($row = mysqli_fetch_assoc($result))
{
$s_name = $row ['s_name'];

?>


					<!-- CATEGORY TITLE -->
					<div class="row">	
						<div class="col">
							<div class="category-title mb-6 text-center">	
								<h2 class="h2-title"><?php echo $s_name ?></h2>	
							</div>	
						</div>
					</div>

					<?php }?>
					<!-- PRICING-1 WRAPPER -->
					<div class="pricing-1-wrapper">
						<div class="row">


							<!-- PRICING-1 TABLE -->
							<div class="col-lg-6">
								<div class="pricing-1-table left-column wow fadeInUp">
									<ul class="pricing-list">
									<?php
    $sql = "SELECT * FROM all_services WHERE service_number = 8 LIMIT 5";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <li class="pricing-5-item">
                <div class="detail-price">
                    <div class="price-name">
                        <p><?php echo $row['all_service']; ?></p>
                    </div>
                    <div class="price-dots"></div>
                    <div class="price-number">
                        <p><?php echo $row['price']; ?></p>
                    </div>
                </div>
                <!-- Description Below -->
                <div class="price-txt">
                    <p><?php echo $row['description']; ?></p>
                </div>
            </li>
    <?php
        }
    }
    ?>
										<!-- PRICING ITEM #1 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Classic Manicure</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹19</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 25 minutes</p>
											</div>
											
										</li> -->

										<!-- MENU ITEM #2 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Spa Manicure</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹30</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 35 minutes</p>
											</div>

										</li> -->

										<!-- MENU ITEM #3 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Aloe Vera Manicure</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹48</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 45 minutes</p>
											</div>

										</li> -->

										<!-- PRICING ITEM #4 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Gel Manicure</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹35</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 40 minutes</p>
											</div>
											
										</li> -->

										<!-- MENU ITEM #5 -->
										<!-- <li class="pricing-1-item resp-lst"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>French Manicure</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹42</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 25-35 minutes</p>
											</div>

										</li> -->

									</ul>	<!-- END PRICING LIST -->
								</div>
							</div>	<!-- END PRICING-1 TABLE -->


							<!-- PRICING-1 TABLE -->
							<div class="col-lg-6">
								<div class="pricing-1-table right-column wow fadeInUp">	
									<ul class="pricing-list">
<?php
    $sql = "SELECT * FROM all_services WHERE service_number = 8 LIMIT 5 OFFSET 5";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <li class="pricing-5-item">
                <div class="detail-price">
                    <div class="price-name">
                        <p><?php echo $row['all_service']; ?></p>
                    </div>
                    <div class="price-dots"></div>
                    <div class="price-number">
                        <p><?php echo $row['price']; ?></p>
                    </div>
                </div>
                <!-- Description Below -->
                <div class="price-txt">
                    <p><?php echo $row['description']; ?></p>
                </div>
            </li>
    <?php
        }
    }
    ?>
										<!-- PRICING ITEM #1 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Signature Gel Manicure</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹50</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 40 minutes</p>
											</div>
											
										</li> -->

										<!-- MENU ITEM #2 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Hard Gel Full Set</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹85</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 1,5 - 2 hours</p>
											</div>

										</li> -->

										<!-- MENU ITEM #3 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Signature Pedicure</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>From ₹65</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 45 minutes</p>
											</div> -->

										<!-- </li> -->

										<!-- PRICING ITEM #4 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Spa Pedicure</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>From ₹75</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 55 minutes</p>
											</div>
											
										</li> -->

										<!-- MENU ITEM #5 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Organic Express Pedi</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹20 - ₹45</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 30 - 55 minutes</p>
											</div>

										</li> -->

									</ul>	<!-- END PRICING LIST -->
								</div>
							</div>	<!-- END PRICING-1 TABLE -->


						</div>
					</div>	<!-- END PRICING-1 WRAPPER -->


				</div>     <!-- End container -->
			</div>	<!-- END PRICING-1 -->




			<!-- PRICING-1
			============================================= -->
			<div class="pt-8 pricing-1 pricing-section division">
				<div class="container">
				<?php
								$sql = "Select * from sub_category_service where s_id = 9";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0)
While ($row = mysqli_fetch_assoc($result))
{
$s_name = $row ['s_name'];

?>

					<!-- CATEGORY TITLE -->
					<div class="row">	
						<div class="col">
							<div class="category-title mb-6 text-center">	
								<h2 class="h2-title"><?php echo $s_name ?></h2>	
							</div>	
						</div>
					</div>

					<?php }?>
					<!-- PRICING-1 WRAPPER -->
					<div class="pricing-1-wrapper">
						<div class="row">


							<!-- PRICING-1 TABLE -->
							<div class="col-lg-6">
								<div class="pricing-1-table left-column wow fadeInUp">
									<ul class="pricing-list">
									<?php
    $sql = "SELECT * FROM all_services WHERE service_number = 9 LIMIT 5";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <li class="pricing-5-item">
                <div class="detail-price">
                    <div class="price-name">
                        <p><?php echo $row['all_service']; ?></p>
                    </div>
                    <div class="price-dots"></div>
                    <div class="price-number">
                        <p><?php echo $row['price']; ?></p>
                    </div>
                </div>
                <!-- Description Below -->
                <div class="price-txt">
                    <p><?php echo $row['description']; ?></p>
                </div>
            </li>
    <?php
        }
    }
    ?>
										<!-- PRICING ITEM #1 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Nail Art</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹20</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 15 minutes</p>
											</div>
											
										</li> -->

										<!-- MENU ITEM #2 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>French Polish</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹32</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 20 minutes</p>
											</div>

										</li> -->

										<!-- MENU ITEM #3 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Paraffin Mask</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹35</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 20 minutes</p>
											</div>

										</li> -->

										<!-- PRICING ITEM #4 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Gel Applications</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹38</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 15 minutes</p>
											</div>
											
										</li> -->

										<!-- MENU ITEM #5 -->
										<!-- <li class="pricing-1-item resp-lst"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Gel Polish Removal</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹36</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 25 minutes</p>
											</div>

										</li> -->

									</ul>	<!-- END PRICING LIST -->
								</div>
							</div>	<!-- END PRICING-1 TABLE -->


							<!-- PRICING-1 TABLE -->
							<div class="col-lg-6">
								<div class="pricing-1-table right-column wow fadeInUp">	
									<ul class="pricing-list">
									<ul class="pricing-list">
									<?php
    $sql = "SELECT * FROM all_services WHERE service_number = 9 LIMIT 5 OFFSET 5";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <li class="pricing-5-item">
                <div class="detail-price">
                    <div class="price-name">
                        <p><?php echo $row['all_service']; ?></p>
                    </div>
                    <div class="price-dots"></div>
                    <div class="price-number">
                        <p><?php echo $row['price']; ?></p>
                    </div>
                </div>
                <!-- Description Below -->
                <div class="price-txt">
                    <p><?php echo $row['description']; ?></p>
                </div>
            </li>
    <?php
        }
    }
    ?>
										<!-- MENU ITEM #1 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Callus Treatment</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹29</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 30 minutes</p>
											</div>

										</li> -->

										<!-- MENU ITEM #2 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Collagen Mask</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹24</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 20-30 minutes</p>
											</div>

										</li> -->

										<!-- MENU ITEM #3 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Holographic Effect</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹33</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 25-30 minutes</p>
											</div>

										</li> -->

										<!-- MENU ITEM #4 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Acrylic Removal</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹28</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 10-15 minutes</p>
											</div>

										</li> -->

										<!-- MENU ITEM #5 -->
										<!-- <li class="pricing-1-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Acrylic Full Set</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹44</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>Service length 35-40 minutes</p>
											</div>

										</li> -->

									</ul>
								</div>
							</div>	<!-- END PRICING-1 TABLE -->


						</div>
					</div>	<!-- END PRICING-1 WRAPPER -->


					<!-- BUTTON -->		
			 		<div class="row">
			 			<div class="col">
			 				<div class="more-btn mt-5">
								<a href="booking.php" class="btn btn--tra-black hover--black">Book Online</a>
							</div>
						</div>
					</div>


				</div>     <!-- End container -->
			</div>	<!-- END PRICING-1 -->




			<!-- BANNER-1
			============================================= -->
			<section class="pt-8 banner-1 banner-section mb-40">
				<div class="container">
					<div class="banner-1-wrapper bg--fixed">
						<div class="row">
							<div class="col">
								<div class="banner-1-txt text-center color--white">

									<!-- Section ID -->	
						 			<span class="section-id">This Week Only</span>

									<!-- Title -->	
									<h2>Get <span>30% OFF</span></h2>
									<h3>Manicure + Gel Polish</h3>

									<!-- Button -->	
									<a href="booking.php" class="btn btn--tra-white hover--white">Book an Appointment</a>

								</div>
							</div>
						</div>   <!-- End row -->	
					</div>    <!-- End banner wrapper -->
				</div>     <!-- End container -->	
			</section>	<!-- END BANNER-1 -->





			<!-- GALLERY-3
			============================================= -->		
			<section id="gallery-3" class="gallery-section division">
				<div class="container">


					<!-- SECTION TITLE -->
					<div class="row justify-content-center">	
						<div class="col-lg-10 col-xl-8">
							<div class="section-title">
								<h3 class="h3-lg color--black">Follow: <a href="#">@reine_studio</a></h3>	
							</div>	
						</div>
					</div>


					<!-- IMAGES WRAPPER -->
					<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6">


						<!-- IMAGE #1 -->
					  	<div class="col">
					  		<div id="img-3-1" class="gallery-image">
						  		<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="images/gallery/nail_01.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/nail_01.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																					 
									</div> 

						  		</div>
							</div>
						</div>


						<!-- IMAGE #2 -->
					  	<div class="col">
					  		<div id="img-3-2" class="gallery-image">
						  		<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="images/gallery/nail_03.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data gallery-video">
										<div class="gallery-link ico-40 color--white">
											<a class="video-popup1" href="https://www.youtube.com/embed/SZEflIVnhH8">
												<span class="flaticon-play"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div>	


						<!-- IMAGE #3 -->
					  	<div class="col">
					  		<div id="img-3-3" class="gallery-image">
						  		<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="images/gallery/nail_02.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/nail_02.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div>


						<!-- IMAGE #4 -->
					  	<div class="col">
					  		<div id="img-3-4" class="gallery-image">
						  		<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="images/gallery/nail_04.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/nail_04.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div>


						<!-- IMAGE #5 -->
					  	<div class="col">
					  		<div id="img-3-5" class="gallery-image">
						  		<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="images/gallery/nail_05.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data gallery-video">
										<div class="gallery-link ico-40 color--white">
											<a class="video-popup2" href="https://www.youtube.com/watch?v=7e90gBu4pas">
												<span class="flaticon-play"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div>


						<!-- IMAGE #6 -->
					  	<div class="col">
					  		<div id="img-3-6" class="gallery-image">
						  		<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="images/gallery/nail_06.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/nail_06.jpg">
												<span class="flaticon-visibility"></span>
											</a>
										</div>																						 
									</div> 

						  		</div>
							</div>
						</div>


					</div>	<!-- END IMAGES WRAPPER -->


				</div>	   <!-- End container -->
			</section>	<!-- END GALLERY-3 -->

			
			<!-- FOOTER-3
			============================================= -->
			<?php include 'footer.php'; ?>
			
			<!-- END FOOTER-3 -->




		</div>	<!-- END PAGE CONTENT -->	




		<!-- EXTERNAL SCRIPTS
		============================================= -->	
		<script src="js/jquery-3.7.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<script src="js/modernizr.custom.js"></script>
		<script src="js/jquery.easing.js"></script>
		<script src="js/menu.js"></script>
		<script src="js/datetimepicker.js"></script>	
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/request-form.js"></script>	
		<script src="js/jquery.validate.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>	
		<script src="js/popper.min.js"></script>
		<script src="js/lunar.js"></script>
		<script src="js/wow.js"></script>
				
		<!-- Custom Script -->		
		<script src="js/custom.js"></script>

		<!-- <script>
			$(document).on({
			    "contextmenu": function (e) {
			        console.log("ctx menu button:", e.which); 

			        // Stop the context menu
			        e.preventDefault();
			    },
			    "mousedown": function(e) { 
			        console.log("normal mouse down:", e.which); 
			    },
			    "mouseup": function(e) { 
			        console.log("normal mouse up:", e.which); 
			    }
			});
		</script> -->

		<script>
			$(function() {
			  $(".switch").click(function() {
			  	 $("body").toggleClass("theme--dark");
			  });
			});
		</script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->															
		<!--
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXX-X']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		-->	


	</body>



<!-- Mirrored from dsathemes.com/html/r_eine_1.1/files/pricing-3.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2024 10:23:53 GMT -->
</html>