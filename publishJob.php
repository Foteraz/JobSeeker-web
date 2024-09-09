<?php
// Include the database connection file
include 'dbconn.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $jobTitle = $conn->real_escape_string($_POST['job_title']);
    $companyName = $conn->real_escape_string($_POST['company_name']);
    $jobLocation = $conn->real_escape_string($_POST['job_location']);
    $jobDescription = $conn->real_escape_string($_POST['job_description']);
    $salary = $conn->real_escape_string($_POST['salary']);
    $contractType = $conn->real_escape_string($_POST['resume']);
    $jobCategory = $_POST['jobCategorySelect'];
    
    echo $jobCategory; 
    // Get the selected job tag ID
    $jobTag = $_POST['jobTagsSelect'];
    
    // Get the selected job region ID
    $jobRegion = $_POST['jobRegionSelect'];

    echo $jobTag;
    // Attempt insert query execution
    $sql = "INSERT INTO jobs (jobName, companyName, location, jobDescription, salary, contractType, jobCategory, jobTags, jobRegion) 
            VALUES ('$jobTitle', '$companyName', '$jobLocation', '$jobDescription', '$salary', '$contractType', '$jobCategory', '$jobTag', '$jobRegion')";
    if ($conn->query($sql) === TRUE) {
        echo "Job posted successfully!";
        header("Location: index.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
