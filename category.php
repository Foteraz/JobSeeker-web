	<!DOCTYPE html>
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
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Job category				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="category.php"> Job category</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
			
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
						<?php
							// Include the database connection file
							include 'dbconn.php';

							// Get the contract type ID from the query string
							$contractTypeId = isset($_GET['contract_type_id']) ? $_GET['contract_type_id'] : null;

							// Perform SQL query to fetch job data
							if ($contractTypeId) {
								$sql = "SELECT j.*, GROUP_CONCAT(t.tag_name SEPARATOR ', ') AS tags 
										FROM jobs j
										LEFT JOIN tags jt ON j.jobTags = jt.tag_id
										LEFT JOIN tags t ON jt.tag_id = t.tag_id
										WHERE j.contractType = ?
										GROUP BY j.job_id
										LIMIT 4";
								$stmt = $conn->prepare($sql);
								$stmt->bind_param("s", $contractTypeId);
							} else {
								// If contract type ID is not provided, fetch all jobs
								$sql = "SELECT j.*, GROUP_CONCAT(t.tag_name SEPARATOR ', ') AS tags 
										FROM jobs j
										LEFT JOIN tags jt ON j.jobTags = jt.tag_id
										LEFT JOIN tags t ON jt.tag_id = t.tag_id
										GROUP BY j.job_id"	;
								$stmt = $conn->prepare($sql);
							}

							// Execute the query
							$stmt->execute();
							$result = $stmt->get_result();

							// Check if query was successful
							if ($result->num_rows > 0) {
								// Loop through the result set
								while ($row = $result->fetch_assoc()) {
									$job_id = $row['job_id'];

									// Output HTML for each job
									echo '<div class="single-post d-flex flex-row">';
									echo '<div class="thumb">';
									echo '<img src="img/post.png" alt="">';
									echo '<ul class="tags">';
									
									// Output job tags
									$tags = explode(', ', $row['tags']);
									foreach ($tags as $tag) {
										echo '<li><a href="#">' . $tag . '</a></li>';
									}
									
									echo '</ul>';
									echo '</div>';
									echo '<div class="details">';
									echo '<div class="title d-flex flex-row justify-content-between">';
									echo '<div class="titles">';
									echo '<a href="single.php"><h4>' . $row['jobName'] . '</h4></a>';
									echo '<h6>' . $row['companyName'] . '</h6>';
									echo '</div>';
									echo '<ul class="btns">';
									echo '<li><a href="#"><span class="lnr lnr-heart"></span></a></li>';
									echo "<a href='ApplyJob.php?job_id=$job_id' class='btn btn-primary mr-2'>Apply</a>";
									echo '</ul>';
									echo '</div>';
									echo '<p>' . $row['jobDescription'] . '</p>';
									echo '<h5>Job Nature: ' . $row['contractType'] . '</h5>';
									echo '<p class="address"><span class="lnr lnr-map"></span> ' . $row['location'] . '</p>';
									echo '<p class="address"><span class="lnr lnr-database"></span> $' . $row['salary'] . '</p>';
									echo '</div>';
									echo '</div>';
								}
							} else {
								echo "No jobs found";
							}

							// Close the statement and connection
							$stmt->close();
							$conn->close();
						?>	

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



