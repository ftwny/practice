<?php
// Login Page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to CSS file -->
</head>

<body>
    <div class="container">
        <h1>Login Page</h1>
        <form action="authenticate.php" method="post">
            <label for="matric">Matric:</label>
            <input type="text" name="matric" id="matric" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>
            <input type="submit" name="submit" value="Login">
        </form>
        <p><a href="register_form.php">Register</a> here if you have not.</p>
    </div>
</body>

</html>
