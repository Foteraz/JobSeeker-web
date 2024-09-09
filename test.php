<?php
// Assuming your MySQL database credentials
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
$conn->close();
?>
