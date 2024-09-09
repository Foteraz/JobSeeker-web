	<!DOCTYPE html>
	
	<?php
	$job_title = "Creative Art Designer";
	$company_name = "Premium Labels Limited";
	$job_description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.";
	$job_type = "Full time";
	$job_location = "56/8, Panthapath Dhanmondi Dhaka";
	$salary = "15k - 25k"; ?>

	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Job Listing</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			  <?php
			session_start();

			// Check if user is logged in
			if (isset($_SESSION['user_id'])) {
				// User is logged in
				// Display logged-in user content
			?>
				<!-- HTML code for logged-in user content -->
				<header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Home</a></li>
				          <li><a href="about-us.php">About Us</a></li>
				          <li><a href="category.php">Category</a></li>
				           
				          <li><a href="blog-home.php">Blog</a></li>
				          <li><a href="contact.php">Contact</a></li>
				          <li class="menu-has-children"><a href="">Pages</a>
				            <ul>
								<li><a href="elements.php">elements</a></li>
								<li><a href="search.php">search</a></li>
								<li><a href="single.php">single</a></li>
				            </ul>
				          </li>
						  <li><a class="ticker-btn" href="profile.php">Profile</a></li>
						  <li><a class="ticker-btn" href="logout.php">Logout</a></li>	

				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header>
			<?php
			} else {
				// User is not logged in
				// Display content for non-logged-in users
			?>
				<!-- HTML code for non-logged-in user content -->
				<header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Home</a></li>
				          <li><a href="about-us.php">About Us</a></li>
				          <li><a href="category.php">Category</a></li>
				           
				          <li><a href="blog-home.php">Blog</a></li>
				          <li><a href="contact.php">Contact</a></li>
				          <li class="menu-has-children"><a href="">Pages</a>
				            <ul>
								<li><a href="elements.php">elements</a></li>
								<li><a href="search.php">search</a></li>
								<li><a href="single.php">single</a></li>
				            </ul>
				          </li>
				          <li><a class="ticker-btn" href="signup.php">Signup</a></li>
				          <li><a class="ticker-btn" href="login.php">Login</a></li>				          				          
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->
			<?php
			}
		?>


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row search-page-top d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-12">
							<h1 class="text-white">
								Search Results				
							</h1>
							<p class="text-white link-nav">
								<a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="search.php"> Job details page</a>
							</p>	
							<form action="#" class="serach-form-area">
								<div class="row justify-content-center form-wrap">
									<div class="col-lg-4 form-cols">
										<input type="text" class="form-control" name="search" placeholder="what are you looging for?">
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects"">
											<select>
												<option value="1">Select area</option>
												<option value="2">Dhaka</option>
												<option value="3">Rajshahi</option>
												<option value="4">Barishal</option>
												<option value="5">Noakhali</option>
											</select>
										</div>
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects2">
											<select>
												<option value="1">All Category</option>
												<option value="2">Medical</option>
												<option value="3">Technology</option>
												<option value="4">Goverment</option>
												<option value="5">Development</option>
											</select>
										</div>										
									</div>
									<div class="col-lg-2 form-cols">
									    <button type="button" class="btn btn-info">
									      <span class="lnr lnr-magnifier"></span> Search
									    </button>
									</div>								
								</div>
							</form>	
							<p class="text-white">49 Results found for <span>"Web developer"</span></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
			
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<?php
							// Assuming your MySQL database credentials
							//$servername = "localhost";
							//$username = "username";
							//$password = "password";
							//$dbname = "database_name";

							// Create connection
							//$conn = new mysqli($servername, $username, $password, $dbname);

							// Check connection
							//if ($conn->connect_error) {
								//die("Connection failed: " . $conn->connect_error);
							//}

							// Assuming you have fetched the job details from the database and stored them in variables

							// Example data
							$job_title = "Creative Art Designer";
							$company_name = "Premium Labels Limited";
							$job_description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.";
							$job_type = "Full time";
							$job_location = "56/8, Panthapath Dhanmondi Dhaka";
							$salary = "15k - 25k";
							$job_tags = ["Art", "Media", "Design"]; // Assuming $job_tags is an array of tags

							// Start the HTML structure
							echo '<div class="col-lg-8 post-list">';
							echo '<div class="single-post d-flex flex-row">';
							echo '<div class="thumb">';
							echo '<img src="img/post.png" alt="">';
							echo '<ul class="tags">';
							// Iterate over job tags array and generate HTML for each tag
							foreach ($job_tags as $tag) {
								echo '<li><a href="#">'.$tag.'</a></li>';
							}
							echo '</ul>';
							echo '</div>';
							echo '<div class="details">';
							echo '<div class="title d-flex flex-row justify-content-between">';
							echo '<div class="titles">';
							echo '<a href="#"><h4>'.$job_title.'</h4></a>';
							echo '<h6>'.$company_name.'</h6>';
							echo '</div>';
							echo '<ul class="btns">';
							echo '<li><a href="#"><span class="lnr lnr-heart"></span></a></li>';
							echo '<li><a href="#">Apply</a></li>';
							echo '</ul>';
							echo '</div>';
							echo '<p>'.$job_description.'</p>';
							echo '<h5>Job Nature: '.$job_type.'</h5>';
							echo '<p class="address"><span class="lnr lnr-map"></span> '.$job_location.'</p>';
							echo '<p class="address"><span class="lnr lnr-database"></span> '.$salary.'</p>';
							echo '</div>';
							echo '</div>';
							// Assuming you have fetched other details and stored them in variables
							// You can continue generating HTML for other sections similarly
							echo '</div>';

							// Close connection
							//$conn->close();
						?>
						<div class="col-lg-4 sidebar">

							<div class="single-slidebar">
								<h4>Jobs by Location</h4>
								<ul class="cat-list">
									<li><a class="justify-content-between d-flex" href="#"><p>New York</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="#"><p>Park Montana</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="#"><p>Atlanta</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="#"><p>Arizona</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="#"><p>Florida</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="#"><p>Rocky Beach</p><span>27</span></a></li>
									<li><a class="justify-content-between d-flex" href="#"><p>Chicago</p><span>17</span></a></li>
								</ul>
							</div>

							<div class="single-slidebar">
								<h4>Top rated job posts</h4>
								<div class="active-relatedjob-carusel">
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										<h4>Creative Art Designer</h4>
										<h6>Premium Labels Limited</h6>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
										</p>
										<h5>Job Nature: Full time</h5>
										<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
										<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
										<a href="#" class="btns text-uppercase">Apply job</a>
									</div>
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										<h4>Creative Art Designer</h4>
										<h6>Premium Labels Limited</h6>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
										</p>
										<h5>Job Nature: Full time</h5>
										<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
										<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
										<a href="#" class="btns text-uppercase">Apply job</a>
									</div>
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										<h4>Creative Art Designer</h4>
										<h6>Premium Labels Limited</h6>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
										</p>
										<h5>Job Nature: Full time</h5>
										<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
										<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
										<a href="#" class="btns text-uppercase">Apply job</a>
									</div>																		
								</div>
							</div>							

							<div class="single-slidebar">
								<h4>Jobs by Category</h4>
								<ul class="cat-list">
									<li><a class="justify-content-between d-flex" href="#"><p>Technology</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="#"><p>Media & News</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="#"><p>Goverment</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="#"><p>Medical</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="#"><p>Restaurants</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="#"><p>Developer</p><span>27</span></a></li>
									<li><a class="justify-content-between d-flex" href="#"><p>Accounting</p><span>17</span></a></li>
								</ul>
							</div>

							<div class="single-slidebar">
								<h4>Carrer Advice Blog</h4>
								<div class="blog-list">
									<div class="single-blog " style="background:#000 url(img/blog1.jpg);">
										<a href="#"><h4>Home Audio Recording <br>
										For Everyone</h4></a>
										<div class="meta justify-content-between d-flex">
											<p>
												02 Hours ago
											</p>
											<p>
												<span class="lnr lnr-heart"></span>
												06
												 <span class="lnr lnr-bubble"></span>
												02
											</p>
										</div>
									</div>
									<div class="single-blog " style="background:#000 url(img/blog2.jpg);">
										<a href="#"><h4>Home Audio Recording <br>
										For Everyone</h4></a>
										<div class="meta justify-content-between d-flex">
											<p>
												02 Hours ago
											</p>
											<p>
												<span class="lnr lnr-heart"></span>
												06
												 <span class="lnr lnr-bubble"></span>
												02
											</p>
										</div>
									</div>
									<div class="single-blog " style="background:#000 url(img/blog1.jpg);">
										<a href="#"><h4>Home Audio Recording <br>
										For Everyone</h4></a>
										<div class="meta justify-content-between d-flex">
											<p>
												02 Hours ago
											</p>
											<p>
												<span class="lnr lnr-heart"></span>
												06
												 <span class="lnr lnr-bubble"></span>
												02
											</p>
										</div>
									</div>																		
								</div>
							</div>							

						</div>
					</div>
				</div>	
			</section>
			<!-- End post Area -->

			<!-- Start callto-action Area -->
			<section class="callto-action-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10 text-white">Join us today without any hesitation</h1>
								<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
								<a class="primary-btn" href="#">I am a Candidate</a>
								<a class="primary-btn" href="#">Request Free Demo</a>
							</div>
						</div>
					</div>	
				</div>	
			</section>
			<!-- End calto-action Area -->			
		
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					 

					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved to Jobify
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>		
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>



