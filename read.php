<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

include 'Database.php';
include 'User.php';

// Create an instance of the Database class and get the connection
$database = new Database();
$db = $database->getConnection();

// Create an instance of the User class
$user = new User($db);
$result = $user->getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to CSS file -->
</head>

<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_matric']); ?>!</h1> <!-- Display logged-in user's matric -->
        <h1>User List</h1>


        <table>
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Level</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row["matric"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["role"]; ?></td>
                        <td><a href="update_form.php?matric=<?php echo $row["matric"]; ?>">Update</a></td>
                        <td><a href="delete.php?matric=<?php echo $row["matric"]; ?>">Delete</a></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5'>No users found</td></tr>";
            }
            $db->close();
            ?>
        </table>

                <!-- Separate Logout Button Container -->
                <div class="logout-container">
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
</body>

</html>
