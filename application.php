<?php
// Start the session
session_start();

// Include the database connection file
include 'dbconn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $resume_id = $_POST['resume'];
    $user_id = $_POST['user_id'];
    $job_id = $_POST['job_id'];
    echo $resume_id;  
    // Insert data into the database
    $query = "INSERT INTO jobapplications (certID, userID, jobID) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii" ,$resume_id, $user_id, $job_id);
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "Application submitted successfully.";
        header("Location: index.php");
    } else {
        echo "Error submitting application.";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
