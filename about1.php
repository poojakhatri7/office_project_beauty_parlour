<?php

include './admin2/db_connection.php';
// Step 2: Execute the query
// $result = mysqli_query($conn, $sql);
// // Step 3: Check if the query returned any results
// if (mysqli_num_rows($result) > 0) {
//     // Step 4: Fetch the data from the database and display it inside the <h1> tag
//     while ($row = mysqli_fetch_assoc($result)) {
//         // Display page title inside an <h1> tag
// 		$about_sections = [];
//         // echo "<h1>". $row['page_title'] . "</h1>";
// 		// $page= $row['page_title'] ;
// 		// $page_description = $row['page_description'];
//         // Optionally, you can display the page description or other data below the heading
//         // echo "<h6>". $row['page_description'] . "</h6>";
// 		if (mysqli_num_rows($result) > 0) {
// 			while ($row = mysqli_fetch_assoc($result)) {
// 				$about_sections[$row['id']] = $row; // Store each row by its ID
// 			}
// 		}
//     }
// }
$sql = "SELECT * FROM tb_about";
$result = mysqli_query($conn, $sql);

$about_sections = []; // Empty array to store data

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $about_sections[$row['id']] = $row; // Store each row by its ID
    }
}
 else {
    // If no record is found, display a message
    echo "<p>No record found.</p>";
}
 
//  echo "<pre>";
//  print_r($about_sections);
//  echo "</pre>";

							// Fetch business hours
$sql = "SELECT * FROM business_hours";
$result1 = mysqli_query($conn, $sql);
$business_hours = [];
							while ($row = mysqli_fetch_assoc($result1)) {
								$business_hours[$row['id']] = $row; 
}
//  echo "<pre>";
//  print_r($business_hours);
//  echo "</pre>";


?>
<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DSAThemes">
	<meta name="description" content="Reine - Beauty Salon HTML5 Template">
	<meta name="keywords"
		content="DSAThemes, Beauty, Salon, Beauty Parlour, Health Care, Makeup, Nail Salon, Therapy, Treatment">
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
	<link href="https://fonts.googleapis.com/css2?family=Vollkorn:wght@400;500;600;700&amp;display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&amp;display=swap"
		rel="stylesheet">

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
	<!--	============================================= -->
	<!--<div id="loading" class="loading-black">-->
	<!--	<div id="loading-center"><span class="loader"></span></div>-->
	<!--</div>-->




	<!-- STYLE SWITCHER
	<!--	============================================= -->
	<!--<div id="stlChanger">-->
	<!--	<div class="blockChanger bgChanger">-->
	<!--		<a href="#" class="chBut ico-35">-->
	<!--			<p class="switch">-->
	<!--				<span class="drk-mode flaticon-moon"></span>-->
	<!--				<span class="lgt-mode flaticon-sum"></span>-->
	<!--			</p>-->
	<!--		</a>-->
	<!--	</div>-->
	<!--</div> -->
	
	<?php include 'preloader.php'; ?>
	
	<!-- END SWITCHER -->




	<!-- PAGE CONTENT
		============================================= -->
	<div id="page" class="page">




		<!-- HEADER
			============================================= -->
		<!--<header id="header" class="tra-menu navbar-light white-scroll">-->
		<!--	<div class="header-wrapper">-->


				<!-- MOBILE HEADER -->
		<!--		<div class="wsmobileheader clearfix">-->
		<!--			<span class="smllogo">-->
		<!--				<a href="index.php" class="logo-black"><img src="images/demo-beauty-studio.webp" alt="mobile-logo"></a>-->
		<!--				<a href="index.php" class="logo-white"><img src="images/demo-beauty-studio.webp" alt="mobile-logo"></a>-->
		<!--			</span>-->
		<!--			<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>-->
		<!--		</div>-->


				<!-- NAVIGATION MENU -->
		<!--		<div class="wsmainfull menu clearfix">-->
		<!--			<div class="wsmainwp clearfix">-->


						<!-- HEADER BLACK LOGO -->
		<!--				<div class="desktoplogo">-->
		<!--					<a href="index.php" class="logo-black"><img src="images/demo-beauty-studio.webp" alt="logo"></a>-->
		<!--				</div>-->


						<!-- HEADER WHITE LOGO -->
		<!--				<div class="desktoplogo">-->
		<!--					<a href="index.php" class="logo-white"><img src="images/demo-beauty-studio.webp" alt="logo"></a>-->
		<!--				</div>-->


						<!-- MAIN MENU -->
		<!--				<nav class="wsmenu clearfix">-->
		<!--					<ul class="wsmenu-list">-->


		<!--						<li class="nl-simple" aria-haspopup="true"><a href="index.php" class="h-link">Home</a></li>-->

		<!--						<li aria-haspopup="true"><a href="#" class="h-link">About <span class="wsarrow"></span></a>-->
		<!--							<ul class="sub-menu">-->
		<!--								<li aria-haspopup="true"><a href="about.php">About Us</a></li>-->
		<!--								<li aria-haspopup="true"><a href="team.php">Artist + Staff</a></li>-->
		<!--							   </ul>-->
		<!--						</li>-->

								<!-- <li class="nl-simple" aria-haspopup="true"><a href="about.php" class="h-link">About</a></li> -->



								<!-- SIMPLE NAVIGATION LINK -->
								<!-- <li class="nl-simple" aria-haspopup="true"><a href="pricing-2.php" class="h-link">Services</a></li> -->


		<!--						<li aria-haspopup="true"><a href="#" class="h-link">Services<span class="wsarrow"></span></a>-->
		<!--							<ul class="sub-menu">-->
		<!--								<li aria-haspopup="true"><a href="pricing-1.php">Hair Services</a></li>-->
		<!--								<li aria-haspopup="true"><a href="pricing-2.php">Beauty Services</a></li>-->
		<!--								<li aria-haspopup="true"><a href="pricing-3.php">Hands & Feet</a></li>-->
		<!--							   </ul>-->
		<!--						</li>-->

								<!-- DROPDOWN MENU -->
								<!-- <li aria-haspopup="true"><a href="#" class="h-link">Pages <span class="wsarrow"></span></a>
		<!--							<div class="wsmegamenu clearfix halfmenu">-->
		<!--								  <div class="container-fluid">-->
		<!--									<div class="row">-->

												
		<!--										<ul class="col-lg-6 link-list">		-->
		<!--											<li><a href="about.php">About Salon</a></li>					-->
		<!--											<li><a href="pricing-1.php">Salon Menu #1</a></li>-->
		<!--											<li><a href="pricing-2.php">Salon Menu #2</a></li>-->
		<!--											<li><a href="pricing-3.php">Salon Menu #3</a></li>-->
		<!--											<li><a href="gift-cards.php">Gift Cards</a></li>  -->
		<!--											<li><a href="team.php">Artists + Staff</a></li>  -->
		<!--											<li><a href="artist-details.php">Artist Details</a></li>  -->
		<!--											<li><a href="gallery.php">Gallery Page</a></li>-->
		<!--										</ul>-->

												  
		<!--										<ul class="col-lg-6 link-list">	-->
		<!--											<li><a href="reviews.php">Testimonials</a></li> -->
		<!--											<li><a href="faqs.php">FAQs Page</a></li>		               -->
		<!--											<li><a href="blog-listing.php">Blog Listing</a></li>-->
		<!--											<li><a href="single-post.php">Blog Post</a></li>-->
		<!--											<li><a href="booking.php">Booking Page</a></li>-->
		<!--											<li><a href="contact.php">Contact Us</a></li>-->
		<!--											<li><a href="location.php">Our Locations</a></li>-->
		<!--										</ul>-->

		<!--									</div>-->
		<!--								  </div>-->
		<!--							</div>-->
		<!--						  </li>	 -->
								<!-- END DROPDOWN MENU -->


								<!-- SIMPLE NAVIGATION LINK -->
		<!--						<li class="nl-simple" aria-haspopup="true"><a href="gallery.php" class="h-link">Portfolio</a></li>-->

		<!--						<li class="nl-simple" aria-haspopup="true"><a href="contact.php" class="h-link">Contact</a></li>-->


								<!-- SIMPLE NAVIGATION LINK -->
								<!-- <li class="nl-simple" aria-haspopup="true"><a href="blog-listing.php" class="h-link">Blog</a></li> -->


								<!-- SIGN UP BUTTON -->
		<!--						<li class="nl-simple" aria-haspopup="true">-->
		<!--							<a href="booking.php" class="btn btn--tra-white hover--white last-link">Book Online</a>-->
		<!--						</li> -->


		<!--					</ul>-->
		<!--				</nav>-->

						<!-- END MAIN MENU -->


		<!--			</div>-->
		<!--		</div> <!-- END NAVIGATION MENU -->


		<!--	</div> <!-- End header-wrapper -->
		<!--</header> -->
		
		<?php include 'header-1.php'; ?>
		
		<!-- END HEADER -->




		<!-- INNER PAGE HERO
			============================================= -->
		<section id="about-page" class="inner-page-hero division">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="page-hero-txt color--white">
						
						<h2><?php echo $about_sections[1]['page_title'] ?></h2>
						<p><?php echo $about_sections[1]['page_description']  ?></p>	
							<!-- <h2>About Demo Studio</h2> -->
							<!-- <p>Demo salon where you will feel unique and special</p> -->
						</div>
					</div>
				</div>
			</div> <!-- End container -->
		</section> <!-- END INNER PAGE HERO -->




		<!-- TEXT CONTENT
			============================================= -->
		<section class="pt-8 ct-03 content-section division">
			<div class="container">
				<div class="row">


					<!-- TEXT BLOCK -->
					<div class="col-lg-6">
						<div class="txt-block left-column wow fadeInRight">


							<!-- TEXT -->
							<div class="ct-03-txt">

								<!-- Section ID -->
								<span class="section-id"><?php echo $about_sections[2]['page_title'] ?></span>

								<!-- Title -->
								<h2 class="h2-md"><?php echo $about_sections[2]['page_description']  ?></h2>

								<!-- Text -->
								<p class="mb-5"><?php echo $about_sections[2]['page_content']  ?>
								</p>

							</div>


							<!-- IMAGE -->
							<div class="ct-03-img">
								<img class="img-fluid" src="images/beauty_08.jpg" alt="content-image">
							</div>


						</div>
					</div> <!-- END TEXT BLOCK -->


					<!-- TEXT BLOCK -->
					<div class="col-lg-6">
						<div class="txt-block right-column wow fadeInLeft">


							<!-- IMAGE -->
							<div class="ct-03-img mb-5">
								<img class="img-fluid" src="images/salon_04.jpg" alt="content-image">
							</div>


							<!-- TEXT -->
							<div class="ct-03-txt">

								<!-- Text -->
								<p class="mb-0"><?php echo $about_sections[2]['page_text'] ?>
								</p>

							</div>


						</div>
					</div> <!-- END TEXT BLOCK -->


				</div> <!-- End row -->
			</div> <!-- End container -->
		</section> <!-- END TEXT CONTENT -->




		<!-- ABOUT-1
			============================================= -->
		<section class="pt-8 about-1 about-section">
			<div class="container">
				<div class="row justify-content-center">


					<!-- TEXT BLOCK -->
					<div class="col-lg-10 col-xl-9">
						<div class="txt-block text-center">

							<!-- Section ID -->
							<span class="section-id"><?php echo $about_sections[3]['page_title'] ?></span>

							<!-- Title -->
							<h2 class="h2-title"><?php echo $about_sections[3]['page_description'] ?></h2>

							<!-- Text -->
							<p class="mb-0"><?php echo $about_sections[3]['page_content'] ?>
							</p>

						</div>
					</div> <!-- END TEXT BLOCK -->


				</div> <!-- End row -->
			</div> <!-- End container -->
		</section> <!-- END ABOUT-1 -->




		<!-- SERVICES-3
			============================================= -->
		<div id="services-3" class="pt-8 services-section division">
			<div class="container">


				<!-- SERVICES-3 WRAPPER -->
				<div class="sbox-3-wrapper text-center">
					<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6">


						<!-- SERVICES BOX #1 -->
						<div class="col">
							<div class="sbox-3 sb-1 wow fadeInUp">

								<!-- Icon -->
								<div class="sbox-ico ico-65">
									<span class="flaticon-facial-treatment color--black"></span>
								</div>

								<!-- Text -->
								<div class="sbox-txt">
									<p>Facials</p>
								</div>

							</div>
						</div> <!-- END SERVICES BOX #1 -->


						<!-- SERVICES BOX #2 -->
						<div class="col">
							<div class="sbox-3 sb-2 wow fadeInUp">

								<!-- Icon -->
								<div class="sbox-ico ico-65">
									<span class="flaticon-eyelashes color--black"></span>
								</div>

								<!-- Text -->
								<div class="sbox-txt">
									<p>Eyelash</p>
								</div>

							</div>
						</div> <!-- END SERVICES BOX #2 -->


						<!-- SERVICES BOX #3 -->
						<div class="col">
							<div class="sbox-3 sb-3 wow fadeInUp">

								<!-- Icon -->
								<div class="sbox-ico ico-65">
									<span class="flaticon-eyebrow color--black"></span>
								</div>

								<!-- Text -->
								<div class="sbox-txt">
									<p>Eyebrow</p>
								</div>

							</div>
						</div> <!-- END SERVICES BOX #3 -->


						<!-- SERVICES BOX #4 -->
						<div class="col">
							<div class="sbox-3 sb-4 wow fadeInUp">

								<!-- Icon -->
								<div class="sbox-ico ico-65">
									<span class="flaticon-wax color--black"></span>
								</div>

								<!-- Text -->
								<div class="sbox-txt">
									<p>Waxing</p>
								</div>

							</div>
						</div> <!-- END SERVICES BOX #4 -->


						<!-- SERVICES BOX #5 -->
						<div class="col">
							<div class="sbox-3 sb-5 wow fadeInUp">

								<!-- Icon -->
								<div class="sbox-ico ico-65">
									<span class="flaticon-foundation color--black"></span>
								</div>

								<!-- Text -->
								<div class="sbox-txt">
									<p>Nails</p>
								</div>

							</div>
						</div> <!-- END SERVICES BOX #5 -->


						<!-- SERVICES BOX #6 -->
						<div class="col">
							<div class="sbox-3 sb-6 wow fadeInUp">

								<!-- Icon -->
								<div class="sbox-ico ico-65">
									<span class="flaticon-cosmetics color--black"></span>
								</div>

								<!-- Text -->
								<div class="sbox-txt">
									<p>Make-Up</p>
								</div>

							</div>
						</div> <!-- END SERVICES BOX #6 -->


					</div> <!-- End row -->
				</div> <!-- END SERVICES-3 WRAPPER -->


				<!-- MORE BUTTON -->
				<div class="row">
					<div class="col">
						<div class="more-btn">
							<a href="pricing-1.php" class="btn btn--tra-black hover--black mb-40">View Our Menu</a>
						</div>
					</div>
				</div>


			</div> <!-- End container -->
		</div> <!-- END SERVICES-3 -->



		<div class="bg--01 bg--scroll ct-12 content-section"></div>


		<!-- WORKING HOURS
			============================================= -->
		<section class="py-8 ct-table content-section division">
			<div class="container">
				<div class="row d-flex align-items-center">


					<!-- TABLE -->
					
					<div class="col-lg-6 order-last order-lg-2">
						<div class="txt-table left-column wow fadeInRight">
							<table class="table">
								<tbody>
									<tr>
										<td> <?php echo $business_hours[1]['day'] ?></td>
										<td> - </td>
										<td class="text-end"><?php 
    echo date("h:i A", strtotime($business_hours[1]['open_time'])) . " - " . 
         date("h:i A", strtotime($business_hours[1]['close_time'])); 
    ?></td>
									
									</tr>
									<tr>
										<td> <?php echo $business_hours[2]['day'] ?></td>
										<td> - </td>
										<td class="text-end"><?php 
    echo date("h:i A", strtotime($business_hours[2]['open_time'])) . " - " . 
         date("h:i A", strtotime($business_hours[2]['close_time'])); 
    ?></td>
									
									</tr>
									<tr>
										<td> <?php echo $business_hours[3]['day'] ?></td>
										<td> - </td>
										<td class="text-end"><?php 
    echo date("h:i A", strtotime($business_hours[3]['open_time'])) . " - " . 
         date("h:i A", strtotime($business_hours[3]['close_time'])); 
    ?></td>
									
									</tr>
									<tr>
										<td> <?php echo $business_hours[4]['day'] ?></td>
										<td> - </td>
										<td class="text-end"><?php 
    echo date("h:i A", strtotime($business_hours[4]['open_time'])) . " - " . 
         date("h:i A", strtotime($business_hours[4]['close_time'])); 
    ?></td>
									
									</tr>
									<tr>
										<td> <?php echo $business_hours[5]['day'] ?></td>
										<td> - </td>
										<td class="text-end"><?php 
    echo date("h:i A", strtotime($business_hours[5]['open_time'])) . " - " . 
         date("h:i A", strtotime($business_hours[5]['close_time'])); 
    ?></td>
									
									</tr>
									<tr>
										<td> <?php echo $business_hours[6]['day'] ?></td>
										<td> - </td>
										<td class="text-end"><?php 
    echo date("h:i A", strtotime($business_hours[6]['open_time'])) . " - " . 
         date("h:i A", strtotime($business_hours[6]['close_time'])); 
    ?></td>
									
									</tr>
									<!-- <tr>
										<td>tuesday</td>
										<td> - </td>
										<td class="text-end">10:00 AM - 7:30 PM</td>
									</tr>
									<tr>
										<td>Friday</td>
										<td> - </td>
										<td class="text-end">10:00 AM - 9:00 PM</td>
									</tr>
									<tr class="last-tr">
										<td>Sun - Sun</td>
										<td>-</td>
										<td class="text-end">10:00 AM - 5:00 PM</td>
									</tr>  -->
								</tbody>
							</table>
						</div>
					</div> <!-- END TABLE -->


					<!-- TEXT -->
					<div class="col-lg-6 order-first order-lg-2">
						<div class="right-column wow fadeInLeft">

							<!-- Section ID -->
							<span class="section-id">Time Schedule</span>

							<!-- Title -->
							<h2 class="h2-md">Working Hours</h2>

							<!-- Text -->
							<p class="mb-0">Check our time table for your convenience! Our working hours are clearly displayed for each day, ensuring you can quickly find the best time to book your appointment. With detailed slots available, you can plan your visit around your schedule and enjoy a seamless beauty experience!
							</p>

						</div>
					</div>


				</div> <!-- End row -->
			</div> <!-- End container -->
		</section> <!-- END WORKING HOURS -->




		<!-- WIDE IMAGE
			============================================= -->
		




		<!-- ABOUT-5
			============================================= -->
		<section class="pt-8 about-5 about-section">
			<div class="container-fluid">
				<div class="row">


					<!-- IMAGE BLOCK -->
					<div class="col">
						<div id="ab-5-1" class="about-5-img">
							<img class="img-fluid" src="images/beauty_02.jpg" alt="about-image">
						</div>
					</div>


					<!-- TEXT BLOCK -->
					<div class="col-md-8 col-lg-7 order-first order-md-1">
						<div class="txt-block">

							<!-- Section ID -->
							<span class="section-id">Be Irresistible</span>

							<!-- Title -->
							<h2 class="h2-title">The Ultimate Relaxation for Your Mind and Body</h2>

							<!-- Button -->
							<a href="gallery.php" class="btn btn--tra-black hover--black">Our Portfolio</a>

							<!-- Image -->
							<div id="ab-5-2" class="about-5-img">
								<img class="img-fluid" src="images/beauty_03.jpg" alt="about-image">
							</div>

						</div>
					</div> <!-- END TEXT BLOCK -->


					<!-- IMAGE BLOCK -->
					<div class="col order-last order-md-2">
						<div id="ab-5-3" class="about-5-img">
							<img class="img-fluid" src="images/beauty_04.jpg" alt="about-image">
						</div>
					</div>


				</div> <!-- End row -->
			</div> <!-- End container -->
		</section> <!-- END ABOUT-5 -->






		<!-- TEXT CONTENT
			============================================= -->
		<section class="py-8 ct-09 content-section division">
			<div class="container text-center">


				<!-- SECTION TITLE -->
				<div class="row justify-content-center">
					<div class="col-md-10 col-lg-8">
						<div class="section-title text-center mb-6">

							<!-- Section ID -->
							<span class="section-id">Focus On Beauty</span>

							<!-- Title -->
							<h2 class="h2-title">Redefine Your Beauty</h2>

						</div>
					</div>
				</div>


				<div class="row d-flex align-items-center">


					<!-- TEXT BLOCK -->
					<div class="col-md-6">
						<div class="left-column wow fadeInRight">

							<!-- IMAGE -->
							<div class="ct-09-img">
								<div class="hover-overlay">
									<img class="img-fluid" src="images/salon_02.jpg" alt="location-photo">
									<div class="item-overlay"></div>
								</div>
							</div>

							<!-- TEXT -->
							<div class="ct-09-txt">

								<!-- Title -->
								<h3>Visit Demo Beauty Studio</h3>

								<p class="ct-09-address">8721 Central Ave, Los Angeles, CA 90036</p>

								<!-- Advantages List -->
								<ul class="advantages ico-30 clearfix">
									<li>
										<p class="me-3">est. 2018</p>
									</li>
									<li>
										<p><a href="contact.php">Learn More</a></p>
									</li>
									<li class="advantages-links-divider">
										<p><span class="flaticon-vertical-line"></span></p>
									</li>
									<li>
										<p><a href="booking.php">Book Now</a></p>
									</li>
								</ul>

							</div> <!-- END TEXT -->

						</div>
					</div> <!-- END TEXT BLOCK -->


					<!-- TEXT BLOCK -->
					<div class="col-md-6">
						<div class="right-column wow fadeInLeft">

							<!-- IMAGE -->
							<div class="ct-09-img">
								<div class="hover-overlay">
									<img class="img-fluid" src="images/salon_03.jpg" alt="location-photo">
									<div class="item-overlay"></div>
								</div>
							</div>

							<!-- TEXT -->
							<div class="ct-09-txt">

								<!-- Title -->
								<h3>Visit Demo Beauty Studio</h3>

								<p class="ct-09-address">8493 Sunset Blvd, Los Angeles, CA 90069</p>

								<!-- Advantages List -->
								<ul class="advantages ico-30 clearfix">
									<li>
										<p class="me-3">est. 2021</p>
									</li>
									<li>
										<p><a href="contact.php">Learn More</a></p>
									</li>
									<li class="advantages-links-divider">
										<p><span class="flaticon-vertical-line"></span></p>
									</li>
									<li>
										<p><a href="booking.php">Book Now</a></p>
									</li>
								</ul>

							</div> <!-- END TEXT -->

						</div>
					</div> <!-- END TEXT BLOCK -->


				</div> <!-- End row -->
			</div> <!-- End container -->
		</section> <!-- END TEXT CONTENT -->




<?php include 'footer.php'; ?>




	</div> <!-- END PAGE CONTENT -->




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
			"mousedown": function (e) {
				console.log("normal mouse down:", e.which);
			},
			"mouseup": function (e) {
				console.log("normal mouse up:", e.which);
			}
		});
	</script> -->

	<script>
		$(function () {
			$(".switch").click(function () {
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



<!-- Mirrored from dsathemes.com/html/r_eine_1.1/files/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2024 10:23:53 GMT -->

</html>