<?php
session_start();

// Check if user ID is set in session
if (!isset($_SESSION['id'])) {
    echo json_encode(['error' => 'User ID not set in session']);
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bcpclinic_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user ID from session
$userId = $_SESSION['id'];

// Query to get the user's first name
$sql = "SELECT Fname FROM head_db WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['error' => 'No user found with the given ID']);
    exit;
}

$user = $result->fetch_assoc();
$firstName = $user['Fname'];

echo json_encode(['fname' => $firstName]);

$stmt->close();
$conn->close();
?>
