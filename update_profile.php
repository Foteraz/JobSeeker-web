<?php
session_start();

include "dbconn.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit(); // Stop further execution
}

// Retrieve form data
$user_id = $_SESSION['user_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// Update user's profile in the database
$sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ?, address = ? WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $first_name, $last_name, $email, $phone, $address, $user_id);

if ($stmt->execute()) {
    // Profile updated successfully
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    // Add more session variables as needed

    header("Location: profile.php"); // Redirect to the profile page
} else {
    // Failed to update profile
    echo "Error updating profile: " . $conn->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
