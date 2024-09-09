<?php
// Connect to your MySQL database
session_start();

// Check if the userId is set in the session
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle the case where userId is not set
    // Example: header("Location: login.php");
    exit("User ID is not set in the session.");
}

$userId = $_SESSION['user_id'];
include 'dbconn.php';

// Check if the CV file has been uploaded
if(isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
    // Call the uploadCV function with the user ID and the uploaded CV file
    uploadCV($userId, $_FILES['cv']);
} else {
    echo "Error uploading CV.";
}

function uploadCV($userId, $cvFile)
{
    global $conn;

    // Generate a unique filename for the CV
    $cvFileName = uniqid($userId . '_') . '.pdf';

    // Specify the directory structure
    $directory = 'cv_uploads/' . $userId . '/';

    // Create directory if it doesn't exist
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }

    // Move uploaded file to the directory
    move_uploaded_file($cvFile["tmp_name"], $directory . $cvFileName);

    // Record the CV path in the database
    $cvPath = $directory . $cvFileName;
    $sql = "INSERT INTO cv_data (user_id, cv_path) VALUES ('$userId', '$cvPath')";
    if ($conn->query($sql) === TRUE) {
        echo "CV uploaded successfully.";
        header("Location: profile.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>

