<?php
// Set a cookie that lasts for 1 day (86400 seconds)
if (!isset($_COOKIE['user'])) {
    setcookie('user', 'student', time() + 86400, "/"); // "/" makes it available across the site
    $message = "Cookie has been set!";
} else {
    $message = "Cookie is already set. Welcome back, " . $_COOKIE['user'] . "!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cookie Demo</title>
</head>

<body>
    <h1>PHP Cookie Demo</h1>
    <p><?php echo $message; ?></p>

    <p>Note: Cookies will only be available on the next page load in most browsers.</p>
    <a href="cookie_demo.php">Refresh Page</a>
</body>

</html>