<?php
session_start();
include 'Database.php';
include 'User.php';

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

// Check if 'matric' is provided in the URL
if (isset($_GET['matric']) && !empty($_GET['matric'])) {
    $matric = $_GET['matric'];

    // Validate that the matric belongs to the logged-in user
    if ($matric !== $_SESSION['user_matric']) {
        die("Error: You can only delete your own data.");
    }

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    // Create an instance of the User class
    $user = new User($db);

    // Attempt to delete the user
    $result = $user->deleteUser($matric);

    if ($result === true) {
        echo "Your account has been deleted successfully.";
        session_destroy(); // Log the user out after deleting their account
        echo '<br><a href="register_form.php">Register a new account</a>';
    } else {
        echo "Error: Could not delete your account.";
    }

    // Close the connection
    $db->close();
} else {
    echo "Error: Matric parameter is missing.";
}
?>
