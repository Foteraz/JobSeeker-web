 
	
<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
	header("Location: login.php");
    exit();
}
?>
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

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Apply Job				
							</h1>	
							<p class="text-white"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="ApplyJob.php"> Apply Job</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<form class="form-area " id="msyForm" action="application.php" method="post" class="contact-form text-right">
						<?php
							// Assuming session_start() has been called before this point to start the session.

							// Include your database connection file
							include 'dbconn.php'; // Update the filename as per your actual file name

							// Retrieve user_id from session
							$user_id = $_SESSION['user_id'];

							// Prepare and execute query to fetch user data
							$query = "SELECT * FROM users WHERE user_id = ?";
							$stmt = $conn->prepare($query);
							$stmt->bind_param("i", $user_id); // Assuming user_id is an integer
							$stmt->execute();
							$result = $stmt->get_result();

							// Check if user data is found
							if ($result->num_rows > 0) {
								// Fetch user data and populate form fields
								$row = $result->fetch_assoc();
								$first_name = $row['first_name'];
								$last_name = $row['last_name'];
								$email = $row['email'];
								$phone = $row['phone'];
								$address = $row['address'];
							} else {
								// Handle case where user data is not found
								// You can redirect to an error page or perform other actions here
							}

							// Close prepared statement and database connection
							$stmt->close();
							$conn->close();
						?>
						<div class="row">	
							<div class="col-lg-12 form-group">
								<div class="row">
									<div class="col-md-6">
										<label for="firstname">First Name:</label><br>
										<input name="firstname" placeholder="Enter your first name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your first name'" class="common-input mb-20 form-control" required="" value="<?php echo $first_name; ?>" type="text" readonly>
									</div>
									<div class="col-md-6">
										<label for="lastname">Last Name:</label><br>
										<input name="lastname" placeholder="Enter your last name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your last name'" class="common-input mb-20 form-control" required=""  value="<?php echo $last_name; ?>"type="text" readonly>
									</div>
								</div>

								<label for="email">Email:</label><br>
								<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" value="<?php echo $email; ?>" type="email" readonly>
								
								<label for="phone">Phone Number:</label><br>
								<input name="phone" placeholder="Enter phone number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter phone number'" class="common-input mb-20 form-control" required="" value="<?php echo $phone; ?>" pe="tel" readonly>
								
								<label for="address">Address:</label><br>
								<input name="address" placeholder="Enter your address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your address'" class="common-input mb-20 form-control" required=""  value="<?php echo $address	; ?>"type="text" readonly>
							
								<?php
									// Assuming session_start() has been called before this point to start the session.

									// Include your database connection file
									include 'dbconn.php'; // Update the filename as per your actual file name

									// Retrieve user_id from session
									$job_id = $_GET['job_id'];

									// Prepare and execute query to fetch user data
									$query = "SELECT * FROM jobs WHERE job_id = ?";
									$stmt = $conn->prepare($query);
									$stmt->bind_param("i", $job_id); // Assuming user_id is an integer
									$stmt->execute();
									$result = $stmt->get_result();

									// Check if user data is found
									if ($result->num_rows > 0) {
										// Fetch user data and populate form fields
										$row = $result->fetch_assoc();
										$jobName = $row['jobName'];
										$companyName = $row['companyName'];
										$location = $row['location'];
										$contractType = $row['contractType'];
										$salary = $row['salary'];
									} else {
										// Handle case where user data is not found
										// You can redirect to an error page or perform other actions here
									}

									// Close prepared statement and database connection
									$stmt->close();
									$conn->close();
								?>

								<label for="jobtitle">Job Title:</label><br>
								<input name="jobtitle" placeholder="Enter job title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter job title'" class="common-input mb-20 form-control" required="" value="<?php echo $jobName; ?>" type="text" readonly>
								
								<label for="companyname">Company Name:</label><br>
								<input name="companyname" placeholder="Enter company name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter company name'" class="common-input mb-20 form-control" required="" value="<?php echo $companyName; ?>" type="text" readonly>
								
								<label for="companylocation">Company Location:</label><br>
								<input name="companylocation" placeholder="Enter company location" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter company location'" class="common-input mb-20 form-control" required="" value="<?php echo $location; ?>" type="text" readonly>
								
								<label for="contracttype">Contract Type:</label><br>
								<input name="contracttype" class="common-input mb-20 form-control" value="<?php echo $contractType; ?>" required="" readonly>
								
								<label for="salary">Salary:</label><br>
								<input name="salary" placeholder="Enter salary" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter salary'" class="common-input mb-20 form-control" required=""value="<?php echo $salary	; ?>" type="text" readonly>
								<?php
									include 'dbconn.php';
									// Fetching resumes from the database
									$user_id = $_SESSION['user_id'];
									$query = "SELECT id, cv_path FROM cv_data WHERE user_id = ?";
									$stmt = $conn->prepare($query);
									$stmt->bind_param("i", $user_id); // Assuming $user_id is the ID of the logged-in user
									$stmt->execute();
									$result = $stmt->get_result();

									$resumes = array();
									while ($row = $result->fetch_assoc()) {
										$resumes[] = $row;
									}			
								?>
									<label for="resume">Select CV:</label><br>
									<select name="resume" class="common-input mb-20 form-control" required>
										<option value="" disabled selected>Select your CV</option>
										<?php
										foreach ($resumes as $resume) {
											echo '<option value="' . $resume['id'] . '">' . $resume['cv_path'] . '</option>';
										}										
										?>
									</select><br>			
								<input type="hidden" id="job_id" name="job_id" value="<?php echo $job_id; ?>"> <!-- Assuming you have job_id available here -->
								<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">

								<button class="primary-btn mt-20 text-white" style="float: right;">Apply</button>
								
								<div class="mt-20 alert-msg" style="text-align: left;"></div>
							</div>
						</div>
					</form>		
				</div>	
			</section>
			<!-- End contact-page Area -->
			
	
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>Top Products</h6>
								<ul class="footer-nav">
									<li><a href="#">Managed Website</a></li>
									<li><a href="#">Manage Reputation</a></li>
									<li><a href="#">Power Tools</a></li>
									<li><a href="#">Marketing Service</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
							 
						</div>
						 			
					</div>

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



