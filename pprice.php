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
?>
<?php
$c_id = $_GET ['c_id'];
// echo $c_id;
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
			
			<?php include 'header-1.php'; ?>
			
			<!-- END HEADER -->






			<!-- INNER PAGE HERO
			============================================= -->	
			<section id="pricing-page-1" class="inner-page-hero division">
				<div class="container">	
					<div class="row">	
						<div class="col">
							<div class="page-hero-txt color--white">
							<?php 
$sql = "Select * from category_service WHERE c_id={$c_id}";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0)
While ($row = mysqli_fetch_assoc($result))
{
$c_service = $row ['c_service'];
$description = $row ['description'];
?>
								<h2><?php echo $c_service  ?> </h2>	
								<p> <?php echo $description ?>  </p>
							</div>	
						</div>
					</div>
				</div>	   <!-- End container --> 
			</section>	<!-- END INNER PAGE HERO -->


<?php }?>

<style>
.price-dots {
  position: relative;
  /* display: table-cell; */
  height: 4px;
  width: 70%;
  z-index: 2;
  background-image: radial-gradient(circle closest-side,#878889 99%,transparent 100%);
  background-position: 30% 100%;
  background-size: 5px 2px;
  background-repeat: repeat-x;
  flex-grow: 1;
  
}

	</style>
			<!-- PRICING-5
			============================================= -->
			<div class="container pt-8 pricing-5 pricing-section">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <?php
            $sql_subcategories = "SELECT scs.s_id, scs.s_name, scs.description AS subcategory_description
                                  FROM sub_category_service scs
                                  WHERE scs.sub_service = $c_id"; 

            $result_subcategories = mysqli_query($conn, $sql_subcategories);

            if (mysqli_num_rows($result_subcategories) > 0) {
                while ($subcategory = mysqli_fetch_assoc($result_subcategories)) {
                    $s_id = $subcategory['s_id'];
            ?>
                    <div class="pricing-5-category mb-4">
                        <h3 class="text-center"><?php echo $subcategory['s_name']; ?></h3>
                        <p class="text-muted text-center"><?php echo $subcategory['subcategory_description']; ?></p>
                    </div>

                    <?php
                    $sql_services = "SELECT asv.a_id, asv.all_service, asv.price, asv.description AS service_description
                                     FROM all_services asv
                                     WHERE asv.service_number = $s_id"; 

                    $result_services = mysqli_query($conn, $sql_services);

                    if (mysqli_num_rows($result_services) > 0) {
                    ?>
                        <ul class="pricing-list">
                            <?php while ($service = mysqli_fetch_assoc($result_services)) { ?>
                                <li class="pricing-5-item d-flex justify-content-between align-items-center gap-3">
                                    <div class="price-name flex-grow-1">
                                        <p class="mb-0"><?php echo $service['all_service']; ?></p>
                                    </div>
									<div class="price-dots "></div> <!-- Dots appear here -->
                                    <div class="price-number">
                                        <p class="fw-bold mb-0"><?php echo $service['price']; ?></p>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } else { ?>
                        <p class="text-center text-danger">No services available for this subcategory.</p>
                    <?php } ?>
            <?php
                }
            } else {
                echo '<p class="text-center text-danger">No subcategories available for this category.</p>';
            }
            ?>
        </div>
    </div>
</div>





			<!-- GALLERY-4
			============================================= -->		
			<div id="gallery-4" class="py-8 gallery-section division">
				<div class="container-fluid">


					<!-- GALLERY-4 WRAPPER -->
					<div class="gallery-4-wrapper">
						<div class="row">


							<!-- IMAGE #1 -->
							<div class="col-md-6 col-lg-2">
								<div id="img-4-1" class="gallery-image">
							  		<div class="hover-overlay"> 

							  			<!-- Image -->
										<img class="img-fluid" src="images/gallery/woman_04.jpg" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<!-- Image Zoom -->
										<div class="image-data">
											<div class="gallery-link ico-30 color--white">
												<a class="image-link" href="images/gallery/woman_04.jpg">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>
							</div>


							<!-- IMAGE #2 -->
							<div class="col-md-6 col-lg-5">
								<div id="img-4-2" class="gallery-image">
							  		<div class="hover-overlay"> 

							  			<!-- Image -->
										<img class="img-fluid" src="images/gallery/woman_01.jpg" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<!-- Image Zoom -->
										<div class="image-data">
											<div class="gallery-link ico-40 color--white">
												<a class="image-link" href="images/gallery/woman_01.jpg">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>
							</div>


							<!-- IMAGE #1 -->
							<div class="col-lg-3">


								<!-- IMAGE #3 -->
								<div id="img-4-3" class="gallery-image">
							  		<div class="hover-overlay"> 

							  			<!-- Image -->
										<img class="img-fluid" src="images/gallery/woman_03.jpg" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<!-- Image Zoom -->
										<div class="image-data">
											<div class="gallery-link ico-40 color--white">
												<a class="image-link" href="images/gallery/woman_03.jpg">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>


								<!-- IMAGE #4 -->
								<div id="img-4-4" class="gallery-image">
							  		<div class="hover-overlay"> 

							  			<!-- Image -->
										<img class="img-fluid" src="images/gallery/woman_02.jpg" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<!-- Image Zoom -->
										<div class="image-data">
											<div class="gallery-link ico-40 color--white">
												<a class="image-link" href="images/gallery/woman_02.jpg">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>

							</div>	


							<div class="col-lg-2">


								<!-- IMAGE #5 -->
								<div id="img-4-5" class="gallery-image">
							  		<div class="hover-overlay"> 

							  			<!-- Image -->
										<img class="img-fluid" src="images/gallery/woman_05.jpg" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<!-- Image Zoom -->
										<div class="image-data">
											<div class="gallery-link ico-30 color--white">
												<a class="image-link" href="images/gallery/woman_05.jpg">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>


								<!-- IMAGE #5 -->
								<div id="img-4-6" class="gallery-image">
							  		<div class="hover-overlay"> 

							  			<!-- Image -->
										<img class="img-fluid" src="images/gallery/woman_06.jpg" alt="gallery-image">			
										<div class="item-overlay"></div>				
										
										<!-- Image Zoom -->
										<div class="image-data">
											<div class="gallery-link ico-30 color--white">
												<a class="image-link" href="images/gallery/woman_06.jpg">
													<span class="flaticon-visibility"></span>
												</a>
											</div>																					 
										</div> 

							  		</div>
								</div>


							</div>


						</div>  <!-- End row -->	
					</div>	<!-- END GALLERY-4 WRAPPER -->	


					<!-- BUTTON -->		
			 		<div class="row">
			 			<div class="col">
			 				<div class="more-btn">
								<a href="gallery.php" class="btn btn--tra-black hover--black">Visit Our Gallery</a>
							</div>
						</div>
					</div>	<!-- END BUTTON -->	


				</div>	   <!-- End container -->
			</div>	<!-- END GALLERY-4 -->




			<!-- BANNER-1
			============================================= -->
			<section class="banner-1 banner-section mb-40">
				<div class="container">
					<div class="banner-1-wrapper banner-1-hair bg--fixed">
						<div class="row">
							<div class="col">
								<div class="banner-1-txt text-center color--white">

									<!-- Section ID -->	
						 			<span class="section-id">This Week Only</span>

									<!-- Title -->	
									<h2>Get <span>30% OFF</span></h2>
									<h3>Custom Color Service</h3>

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
									<img class="img-fluid" src="images/gallery/hair_01.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_01.jpg">
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
									<img class="img-fluid" src="images/gallery/hair_02.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_02.jpg">
												<span class="flaticon-visibility"></span>
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
									<img class="img-fluid" src="images/gallery/hair_03.jpg" alt="gallery-image">			
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


						<!-- IMAGE #4 -->
					  	<div class="col">
					  		<div id="img-3-4" class="gallery-image">
						  		<div class="hover-overlay"> 

						  			<!-- Image -->
									<img class="img-fluid" src="images/gallery/hair_04.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_04.jpg">
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
									<img class="img-fluid" src="images/gallery/hair_05.jpg" alt="gallery-image">			
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
									<img class="img-fluid" src="images/gallery/hair_06.jpg" alt="gallery-image">			
									<div class="item-overlay"></div>				
									
									<!-- Image Zoom -->
									<div class="image-data">
										<div class="gallery-link ico-40 color--white">
											<a class="image-link" href="images/gallery/hair_06.jpg">
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




			
			<!-- MODAL-2
			============================================= -->
			
			<!-- END MODAL-2 -->



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



<!-- Mirrored from dsathemes.com/html/r_eine_1.1/files/pricing-1.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2024 10:23:52 GMT -->
</html>