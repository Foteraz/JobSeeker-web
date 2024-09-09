<?php
// Connect to your MySQL database
include 'dbconn.php';
// Function to delete CV and remove its record from the database
function downloadCertificate($certId)
{
    global $conn;

    // Fetch CV path from the database
    $sql = "SELECT certificate_path FROM certificates WHERE id = '$certId'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cvPath = $row["certificate_path"];

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
    $certId = $_GET["cert_id"];
    downloadCertificate($certId);
    header("Location: profile.php");   
}

?>