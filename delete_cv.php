<?php
// Connect to your MySQL database
include 'dbconn.php';
// Function to delete CV and remove its record from the database
function deleteCV($cvId)
{
    global $conn;

    // Fetch CV path from the database
    $sql = "SELECT cv_path FROM cv_data WHERE id = '$cvId'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cvPath = $row["cv_path"];

        // Delete CV file
        if (unlink($cvPath)) {
            // Remove record from the database
            $deleteSql = "DELETE FROM cv_data WHERE id = '$cvId'";
            if ($conn->query($deleteSql) === TRUE) {
                echo "CV deleted successfully.";
            } else {
                echo "Error deleting CV record: " . $conn->error;
            }
        } else {
            echo "Error deleting CV file.";
        }
    } else {
        echo "CV not found.";
    }
}

// Example usage
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cvId = $_GET["cv_id"];
    deleteCV($cvId);
    header("Location: profile.php");   
}

$conn->close();
?>
