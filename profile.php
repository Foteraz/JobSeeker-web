<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page or display an error message
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Management - Jobify</title>
    <link rel="stylesheet" href="ProfileManagement.css">
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
      <section class="banner-area relative" id="home">	
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                </div>											
            </div>
        </div>
    </section>

<div class="container">
    <h2 class="page-title">Update Your Profile</h2>
    <form id="profile-form" method="post" action="update_profile.php">
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

        <!-- Display form with fetched user data -->
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" required><br>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>"><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address"><?php echo $address; ?></textarea><br>
        <input type="submit" value="Update Profile">
    </form>
	<p></p>
	<p></p>
	<div class="form-section">
		<h3>CVs</h3>
		<!-- CV upload form -->
		<form id="cv-form" method="post" action="upload_cv.php" enctype="multipart/form-data">
			<label for="cv">Upload CV:</label>
			<input type="file" id="cv" name="cv">
			<input type="submit" value="Upload CV">
		</form>
		<form>
		<!-- Display uploaded CVs and option to delete -->
		<ul>
		<?php
			// Establish database connection
			include 'dbconn.php'; // Assuming this file contains database connection code

			// Get the user ID from the session
			$user_id = $_SESSION['user_id'];

			// Fetch CVs associated with the user from the database
			$query = "SELECT cv_path, id FROM cv_data WHERE user_id = ?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();

			// Check if CVs are found
			if ($result->num_rows > 0) {
				// Display the CVs for download and delete
				while ($row = $result->fetch_assoc()) {
					$cv_id = $row['id'];
					$cv_path = $row['cv_path'];

					// Output HTML for downloading and deleting CV
					echo "<div class='d-flex justify-content-between align-items-center border-bottom mb-3 pb-3'>";
					echo "<div>";
					echo "<p>CV ID: $cv_id</p>";
					echo "<p>CV Path: $cv_path</p>";
					echo "</div>";
					echo "<div>";
					echo "<a href='download_cv.php?cv_id=$cv_id' class='btn btn-primary mr-2'>Download CV</a>";
					echo "<a href='delete_cv.php?cv_id=$cv_id' class='btn btn-danger mr-2'>Delete CV</a>";
					echo "</form>";
					echo "</div>";
					echo "</div>";
				}
			} else {
				// No CVs found for the user
				echo "No CVs found for the user.";
			}
			$stmt->close();
			$conn->close();

		?>
		</ul>
		</form>
	</div>

	<p></p>
	<p></p>

	<div class="form-section">
		<h3>Certificates</h3>
		<!-- Certificate upload form -->
		<form id="certificate-form" method="post" action="upload_certificate.php" enctype="multipart/form-data">
			<label for="certificate">Upload Certificate:</label>
			<input type="file" id="certificate" name="certificate">
			<input type="submit" value="Upload Certificate">
		</form>
		<form>
		<!-- Display uploaded certificates and option to delete -->
		<ul>
			<?php
				// Establish database connection
				include 'dbconn.php'; // Assuming this file contains database connection code

				// Get the user ID from the session
				$user_id = $_SESSION['user_id'];

				// Fetch CVs associated with the user from the database
				// Fetch certificates associated with the user from the database
				$query_cert = "SELECT certificate_path, id, created_at FROM certificates WHERE user_id = ?";
				$stmt= $conn->prepare($query_cert);
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result_cert = $stmt->get_result();

				// Check if certificates are found
				if ($result_cert->num_rows > 0) {
					// Display the certificates for download and delete
					while ($row_cert = $result_cert->fetch_assoc()) {
						$cert_id = $row_cert['id'];
						$cert_path = $row_cert['certificate_path'];
						$cert_date = $row_cert['created_at'];

						// Output HTML for downloading and deleting certificate
						echo "<div class='d-flex justify-content-between align-items-center cert-item border-bottom mb-3 pb-3'>";
						echo "<div>";
						echo "<p>Certificate ID: $cert_id</p>";
						echo "<p>Created At: $cert_date</p>";
						echo "</div>";
						echo "<div>";
						echo "<a href='download_certificate.php?cert_id=$cert_id' class='btn btn-primary mr-2'>Download Cert</a>";
						echo "<a href='delete_certificate.php?cert_id=$cert_id' class='btn btn-danger mr-2'>Delete Cert</a>";
						echo "</div>";
						echo "</div>";
					}
				} else {
					// No certificates found for the user
				}

				// Close the database connections
				$stmt->close();				
				$conn->close();
			?>
		</ul>
			</form>
	</div>
</div>


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
