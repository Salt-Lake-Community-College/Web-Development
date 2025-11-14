<?php
// Start the session

// Handle form submissions

// Set session variable when "Login" is clicked

// Clear all session variables in the current session

// Destroy the session on the server

// Restart session to allow new login without errors

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Interactive Session Demo</title>
</head>

<body>
    <h1>Interactive Session Demo</h1>

    <!-- Create an if else statement to show if the user is logged in or logged out -->
    <p>Welcome, <?php echo $_SESSION['username']; ?>! You are logged in.</p>
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
    <p>You are not logged in.</p>
    <form method="post">
        <button type="submit" name="login">Login</button>
    </form>


</body>

</html>