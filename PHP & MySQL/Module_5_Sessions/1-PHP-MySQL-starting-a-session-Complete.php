<?php
// Start the session
session_start();

// Set a session variable
$_SESSION['username'] = 'student';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Session Start Demo</title>
</head>

<body>
    <!-- Display the session variable -->
    <h1>Hello, <?php echo $_SESSION['username']; ?>!</h1>
    <p>This page demonstrates starting a session and setting a session variable.</p>
</body>

</html>