<?php
// Database configuration
$host = 'localhost';
$db   = 'guru_cyber_cafe';
$user = 'root';
$pass = '';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get POST data
$name    = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
$email   = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
$subject = isset($_POST['subject']) ? $conn->real_escape_string($_POST['subject']) : '';
$message = isset($_POST['message']) ? $conn->real_escape_string($_POST['message']) : '';

// Insert into database
$sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo 'Thank you, ' . htmlspecialchars($name) . '! Your message has been received.';
} else {
    echo 'Error: ' . $conn->error;
}

$conn->close();
?>
