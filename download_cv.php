<?php
// Connect to your MySQL database
include 'dbconn.php';
// Function to delete CV and remove its record from the database
function downloadCV($cvId)
{
    global $conn;

    // Fetch CV path from the database
    $sql = "SELECT cv_path FROM cv_data WHERE id = '$cvId'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cvPath = $row["cv_path"];

        if(file_exists($cvPath)) {
            // Set headers for file download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($cvPath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($cvPath));

            // Read the file and output it
            readfile($cvPath);

            // Exit to prevent further output
            exit;
        } else {
            // File not found
            echo 'File not found.';
        }
    }
}
// Example usage
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cvId = $_GET["cv_id"];
    downloadCV($cvId);
    header("Location: profile.php");   
}

?>