<?php
session_start();
// Database connection parameters
include 'dbconn.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $status = $_POST['status'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    // SQL to insert data into database
    $sql = "INSERT INTO users (first_name, last_name, email, date_of_birth, marital_status, country, gender, address, password) VALUES ('$first_name', '$last_name', '$email', '$date_of_birth', '$status', '$country', '$gender', '$address', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        $_SESSION['first_name'] = $first_name;
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
