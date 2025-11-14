<?php
// Start the session
session_start();

// Handle form submissions
if (isset($_POST['login'])) {
    // Set session variable when "Login" is clicked
    $_SESSION['username'] = 'student';
} elseif (isset($_POST['logout'])) {
    // Clear all session variables in the current session
    session_unset();

    // Destroy the session on the server
    session_destroy();

    // Restart session to allow new login without errors
    session_start();
}
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
    <?php if (isset($_SESSION['username'])): ?>
        <p>Welcome, <?php echo $_SESSION['username']; ?>! You are logged in.</p>
        <form method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    <?php else: ?>
        <p>You are not logged in.</p>
        <form method="post">
            <button type="submit" name="login">Login</button>
        </form>
    <?php endif; ?>

</body>

</html>