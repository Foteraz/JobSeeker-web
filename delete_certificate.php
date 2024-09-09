<?php
// Connect to your MySQL database
include 'dbconn.php';

// Function to delete certificate and remove its record from the database
function deleteCertificate($certificateId)
{
    global $conn;

    // Fetch certificate path from the database
    $sql = "SELECT certificate_path FROM cv_data WHERE id = '$certificateId'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $certificatePath = $row["certificate_path"];

        // Delete certificate file
        if (unlink($certificatePath)) {
            // Update certificate path in the database
            $updateSql = "UPDATE cv_data SET certificate_path = NULL WHERE id = '$certificateId'";
            if ($conn->query($updateSql) === TRUE) {
                echo "Certificate deleted successfully.";
            } else {
                echo "Error updating certificate record: " . $conn->error;
            }
        } else {
            echo "Error deleting certificate file.";
        }
    } else {
        echo "Certificate not found.";
    }
}

// Example usage
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $certificateId = $_GET["certificate_id"];

    deleteCertificate($certificateId);
}

$conn->close();
?>
