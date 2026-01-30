<?php
// SQL Test Script
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'guru_cyber_cafe';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result) {
    echo '<h2>Tables in database:</h2><ul>';
    while ($row = $result->fetch_array()) {
        echo '<li>' . htmlspecialchars($row[0]) . '</li>';
    }
    echo '</ul>';
} else {
    echo 'Error running query: ' . $conn->error;
}

$conn->close();
?>
