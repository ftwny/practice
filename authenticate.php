<?php
session_start();
include 'Database.php';
include 'User.php';

if (isset($_POST['submit']) && ($_SERVER['REQUEST_METHOD'] == 'POST')) {
    $database = new Database();
    $db = $database->getConnection();

    $matric = $db->real_escape_string($_POST['matric']);
    $password = $db->real_escape_string($_POST['password']);

    if (!empty($matric) && !empty($password)) {
        $user = new User($db);
        $userDetails = $user->getUser($matric);

        if ($userDetails && password_verify($password, $userDetails['password'])) {
            // Set session variables for the logged-in user
            $_SESSION['loggedin'] = true;
            $_SESSION['user_matric'] = $userDetails['matric'];
            $_SESSION['user_role'] = $userDetails['role'];
            $_SESSION['last_activity'] = time(); // Record login time
            $_SESSION['timeout'] = 300; // 5 minutes timeout

            header('Location: read.php'); // Redirect to read.php
            exit();
        } else {
            echo 'Login Failed';
        }
    } else {
        echo 'Please fill in all required fields.';
    }
}
