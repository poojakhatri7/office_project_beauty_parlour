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
echo $c_id;
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

			<!-- PRICING-5
			============================================= -->
			<div class="pt-8 pricing-5 pricing-section division">
				<div class="container">


					<!-- PRICING-5 WRAPPER -->
					<div class="pricing-5-wrapper">
						<div class="row">	


							<!-- PRICING-5 TABLE -->
							<div class="col-lg-6">
								<div class="pricing-5-table left-column wow fadeInUp">
									<?php
								$sql = "Select * from sub_category_service where s_id = 1";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0)
While ($row = mysqli_fetch_assoc($result))
{
$s_name = $row ['s_name'];

?>

									<!-- PRICING LIST CATEGORY -->
									<div class="pricing-5-category mb-4">
										<h3><?php echo $s_name ?></h3>
									</div>

									<?php }?>

					
									<!-- CUTTING & STYLING -->
									<ul class="pricing-list">

										<!-- PRICING ITEM #1 -->
										
										<ul class="pricing-list">
    <?php
    $sql = "SELECT * FROM all_services WHERE service_number = 1";
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
</ul>

									<!-- END CUTTING & STYLING -->
										<!-- MENU ITEM #2 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Men's Haircut</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹45 - ₹92</p></div>
											</div>
										</li> -->

										<!-- MENU ITEM #3 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Blow Dry</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>From ₹44</p></div>
											</div>
										</li> -->

										<!-- MENU ITEM #4 -->
										<!-- <li class="pricing-5-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Updo/Style</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹75 - ₹164</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>(shampoo not included)</p>
											</div>
										</li> -->

										<!-- MENU ITEM #5 -->
										<!-- <li class="pricing-5-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Child’s Haircut</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹32 - ₹68</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>(12 years old + under)</p>
											</div> -->

											<?php
								$sql = "Select * from sub_category_service where s_id = 3";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0)
While ($row = mysqli_fetch_assoc($result))
{
$s_name = $row ['s_name'];

?>									
								

									<!-- PRICING LIST CATEGORY -->
									<div class="pricing-5-category mt-4 mb-4">
										<h3><?php echo $s_name ?></h3>
									</div>
<?php }?>

									<!-- HAIR COLORING -->
									<ul class="pricing-list">
									<?php
    $sql = "SELECT * FROM all_services WHERE service_number = 3";
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
	</ul>
										<!-- PRICING ITEM #1 -->
										<!-- <li class="pricing-5-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Single Process</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹130 - ₹195</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>(gloss not included)</p>
											</div>

										</li> -->

										<!-- MENU ITEM #2 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Double Process</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹90 - ₹375</p></div>
											</div>
										</li> -->

										<!-- MENU ITEM #3 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Full Head Highlights</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹345 - ₹380</p></div>
											</div>
										</li> -->

										<!-- MENU ITEM #4 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Half Head Highlights</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹260 - ₹290</p></div>
											</div>
										</li> -->

										<!-- MENU ITEM #5 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Balayage</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹85 - ₹220</p></div>
											</div>
										</li> -->

										<!-- MENU ITEM #6 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Color Refresh</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹95 - ₹130</p></div>
											</div>
										</li> -->

									</ul>	<!-- END HAIR COLORING -->


								</div>
							</div>	<!-- END PRICING-1 TABLE -->


							<!-- PRICING-1 TABLE -->
							<div class="col-lg-6">
								<div class="pricing-5-table right-column wow fadeInUp">
								<?php
								$sql = "Select * from sub_category_service where s_id = 2";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0)
While ($row = mysqli_fetch_assoc($result))
{
$s_name = $row ['s_name'];

?>									

									<!-- PRICING LIST CATEGORY -->
									<div class="pricing-5-category p5-top mb-4">
										<h3><?php echo $s_name ?> </h3>
									</div>
									<?php }?>

									<!-- HAIR TREATMENTS -->
									<ul class="pricing-list">
									<?php
    $sql = "SELECT * FROM all_services WHERE service_number = 2";
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
	</ul>

										<!-- PRICING ITEM #1 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Brazilian Blow Out</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹180 - ₹255</p></div>
											</div>
										</li>

										</ul> -->
										<!-- MENU ITEM #2 -->
										<!-- <li class="pricing-5-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Keratin Complex Express</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹210</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>(Service length 60 minutes)</p>
											</div>

										</li> -->

										<!-- MENU ITEM #3 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Keratin Complex</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹280 - ₹420</p></div>
											</div>
										</li> -->

										<!-- MENU ITEM #4 -->
										<!-- <li class="pricing-5-item"> -->

											<!-- Title & Price -->
											<!-- <div class="detail-price">
												<div class="price-name"><p>Keratin Complex Max</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹350 - ₹495</p></div>
											</div> -->

											<!-- Description -->
											<!-- <div class="price-txt">
												<p>(Includes KC MAX Treatment Spray)</p>
											</div>

										</li> -->

										<!-- MENU ITEM #5 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Permanent Wave</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹185 - ₹240</p></div>
											</div>
										</li> -->

										<!-- MENU ITEM #5 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Hair Gloss</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹40 - ₹55</p></div>
											</div>
										</li> -->

										<!-- MENU ITEM #5 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Safe Color Treatment</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹35 - ₹95</p></div>
											</div>
										</li> -->

										<!-- MENU ITEM #6 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Hair & Scalp Treatments</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹45 - ₹240</p></div>
											</div>
										</li> -->

										<!-- END HAIR TREATMENTS -->


									<!-- PRICING LIST CATEGORY -->
									<?php
								$sql = "Select * from sub_category_service where s_id = 4";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0)
While ($row = mysqli_fetch_assoc($result))
{
$s_name = $row ['s_name'];

?>
									<div class="pricing-5-category mt-4 mb-4">
										<h3><?php echo $s_name ?></h3>
									</div>

									<?php }?>
									<!-- HAIR EXTENSIONS -->
									<ul class="pricing-list">
									<?php
    $sql = "SELECT * FROM all_services WHERE service_number = 4";
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
	</ul>
									<!-- <ul class="pricing-list"> -->

										<!-- PRICING ITEM #1 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Blowdry with Extensions</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹65 - ₹95</p></div>
											</div>
										</li> -->

										<!-- MENU ITEM #2 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Extensions Service</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹110 per hour</p></div>
											</div>
										</li> -->

										<!-- MENU ITEM #3 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Keratin Hair Extensions</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹720 - ₹860</p></div>
											</div>
										</li> -->

										<!-- MENU ITEM #4 -->
										<!-- <li class="pricing-5-item">
											<div class="detail-price">
												<div class="price-name"><p>Hair Extension Removal</p></div>
												<div class="price-dots"></div>
												<div class="price-number"><p>₹85 - ₹275</p></div>
											</div>
										</li> -->

									</ul>	<!-- END HAIR EXTENSIONS -->


								</div>
							</div>	<!-- END PRICING-1 TABLE -->


						</div>
					</div>	<!--END  PRICING-1 WRAPPER -->


					<!-- BUTTON -->		
			 		<div class="row">
			 			<div class="col">
			 				<div class="more-btn mt-6">
								<a href="booking.php" class="btn btn--tra-black hover--black">Book Online</a>
							</div>
						</div>
					</div>	<!-- END BUTTON -->	


				</div>  <!-- End container --> 
			</div>	<!-- PRICING-5  -->




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