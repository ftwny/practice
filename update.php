<?php
session_start();
include 'Database.php';
include 'User.php';

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

// Check for session timeout
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $_SESSION['timeout'])) {
    // If the session has timed out, destroy it and redirect to login
    session_unset();
    session_destroy();
    header('Location: login.php?timeout=true');
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time();

// Get the matric number from the session
$matric = $_SESSION['user_matric'];

// Validate and update user details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = trim($_POST['name']);
    $newRole = $_POST['role'];

    // Input validation
    if (!preg_match('/^[a-zA-Z\s]+$/', $newName)) {
        die('Invalid name. Only letters and spaces are allowed.');
    }

    // Create a database connection
    $database = new Database();
    $db = $database->getConnection();

    // Update user information
    $user = new User($db);
    $result = $user->updateUser($matric, $newName, $newRole);

    $db->close();

    if ($result === true) {
        echo 'User updated successfully. <a href="read.php">Go back to user list</a>.';
    } else {
        echo "Error: $result";
    }
}
