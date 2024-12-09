<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

// Check for session timeout
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $_SESSION['timeout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php?timeout=true');
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time();

include 'Database.php';
include 'User.php';

// Get the matric number from the session
$matric = $_SESSION['user_matric'];

// Create a database connection
$database = new Database();
$db = $database->getConnection();

// Get user details
$user = new User($db);
$userDetails = $user->getUser($matric);

// Close the database connection
$db->close();

// Check if user exists
if (!$userDetails) {
    die("Error: User not found.");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to the CSS file -->
</head>
<body>
    <div class="container">
        <h1>Update User</h1>
        <form action="update.php" method="post">
            <label for="matric">Matric:</label>
            <input type="text" id="matric" name="matric" value="<?php echo htmlspecialchars($userDetails['matric']); ?>" readonly>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userDetails['name']); ?>" required>

            <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="lecturer" <?php if ($userDetails['role'] === 'lecturer') echo 'selected'; ?>>Lecturer</option>
                <option value="student" <?php if ($userDetails['role'] === 'student') echo 'selected'; ?>>Student</option>
            </select><br><br>

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
