<?php
include 'Database.php';
include 'User.php';

if (isset($_POST['submit']) && ($_SERVER['REQUEST_METHOD'] == 'POST')) {
    $database = new Database();
    $db = $database->getConnection();

    $matric = $db->real_escape_string($_POST['matric']);
    $name = $db->real_escape_string($_POST['name']);
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (!empty($matric) && !empty($name) && !empty($password) && !empty($role)) {
        $user = new User($db);
        $result = $user->createUser($matric, $name, $password, $role);

        if ($result === true) {
            // Start session and redirect to read.php after registration
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_matric'] = $matric;
            $_SESSION['user_role'] = $role;

            header('Location: read.php');
            exit();
        } else {
            echo "Error: $result";
        }
    } else {
        echo 'Please fill in all required fields.';
    }
}
