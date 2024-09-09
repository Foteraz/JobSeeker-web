<?php
session_start();

// Check if the userId is set in the session
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle the case where userId is not set
    // Example: header("Location: login.php");
    exit("User ID is not set in the session.");
}

$userId = $_SESSION['user_id'];
// Connect to your MySQL database
include 'dbconn.php';

// Function to save certificate and record its path in the database
if(isset($_FILES['certificate']) && $_FILES['certificate']['error'] === UPLOAD_ERR_OK) {
    // Call the uploadCV function with the user ID and the uploaded CV file
    uploadCertificate($userId, $_FILES['certificate']);
} else {
    echo "Error uploading CV.";
}
function uploadCertificate($userId, $certificateFile)
{
    global $conn;

    // Generate a unique filename for the certificate
    $certificateFileName = uniqid($userId . '_') . '.pdf';

    // Specify the directory structure
    $directory = 'certificate_uploads/' . $userId . '/';

    // Create directory if it doesn't exist
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }

    // Move uploaded file to the directory
    move_uploaded_file($certificateFile["tmp_name"], $directory . $certificateFileName);

    // Record the certificate path in the database
    $certificatePath = $directory . $certificateFileName;
    $sql = "INSERT INTO certificates (user_id, certificate_path) VALUES ('$userId', '$certificatePath')";
    if ($conn->query($sql) === TRUE) {
        echo "Certificate uploaded successfully.";
        header("Location: profile.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Example usage
$conn->close();
?>
