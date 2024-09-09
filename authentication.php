<?php
session_start();

include "dbconn.php";

// Retrieve form data
$first_name = $_POST['first_name'];
$password = $_POST['password'];

// SQL to authenticate user
$sql = "SELECT * FROM users WHERE first_name = '$first_name' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Authentication successful
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['user_id']; // Assuming 'id' is the column name for the user ID in your database
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name'] = $user['last_name'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['phone'] = $user['phone'];
    $_SESSION['address'] = $user['address'];
    header("Location: index.php");
} else {
    // Authentication failed
    echo "Invalid first name or password.";
}

// Close connection
$conn->close();
?>
