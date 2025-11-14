<?php
// Start of the interactive cookie demo
$message = "";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Set the cookie when the "Set Cookie" button is clicked
    if (isset($_POST['set_cookie'])) {
        setcookie('user', 'student', time() + 86400, "/"); // Cookie lasts 1 day
        $message = "Cookie 'user' has been set! Reload the page to see it in action.";
    }

    // Delete the cookie when the "Delete Cookie" button is clicked
    if (isset($_POST['delete_cookie'])) {
        setcookie('user', '', time() - 3600, "/"); // Expire the cookie
        $message = "Cookie 'user' has been deleted!";
    }

    // Set a custom cookie if submitted
    if (isset($_POST['set_custom_cookie']) && !empty($_POST['cookie_name'])) {
        $name = htmlspecialchars(trim($_POST['cookie_name']));
        $value = htmlspecialchars(trim($_POST['cookie_value']));
        setcookie($name, $value, time() + 86400, "/");
        $message = "Custom cookie '$name' has been set with value '$value'.";
    }
}

// Determine cookie status for display
if (isset($_COOKIE['user'])) {
    $cookieStatus = "Current cookie value: " . $_COOKIE['user'] . " 🍪";
    $cookieColor = "green";
} else {
    $cookieStatus = "No cookie is currently set. ❌";
    $cookieColor = "red";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Advanced Interactive Cookie Demo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }

        .status {
            font-size: 1.2em;
            margin-bottom: 1em;
        }

        .cookie-box {
            font-size: 2em;
            margin-bottom: 1em;
        }

        button {
            margin-right: 1em;
            padding: 0.5em 1em;
            font-size: 1em;
            cursor: pointer;
        }

        form {
            margin-bottom: 1em;
        }

        input {
            margin-right: 0.5em;
            padding: 0.25em 0.5em;
        }

        pre {
            background-color: #f2f2f2;
            padding: 1em;
        }

        .tip {
            color: #555;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <h1>Advanced Interactive Cookie Demo</h1>

    <!-- Visual cookie status -->
    <div class="cookie-box" style="color: <?php echo $cookieColor; ?>;">
        <?php echo isset($_COOKIE['user']) ? "🍪 Cookie Active" : "❌ No Cookie"; ?>
    </div>

    <!-- Display messages about actions -->
    <p class="status"><?php echo $message; ?></p>
    <p class="status"><?php echo $cookieStatus; ?></p>

    <!-- Buttons for main cookie actions -->
    <form method="post">
        <button type="submit" name="set_cookie">Set Cookie 'user'</button>
        <button type="submit" name="delete_cookie">Delete Cookie 'user'</button>
    </form>

    <!-- Custom cookie creation -->
    <form method="post">
        <label>Cookie Name:</label>
        <input type="text" name="cookie_name" placeholder="Enter name" required>
        <label>Cookie Value:</label>
        <input type="text" name="cookie_value" placeholder="Enter value">
        <button type="submit" name="set_custom_cookie">Set Custom Cookie</button>
    </form>

    <!-- Display all cookies -->
    <h2>All Cookies on This Page:</h2>
    <pre><?php print_r($_COOKIE); ?></pre>

    <!-- Display HTTP headers sent -->
    <h2>HTTP Headers Sent by PHP:</h2>
    <pre><?php print_r(headers_list()); ?></pre>

    <p class="tip">Tip: Open your browser's developer tools (usually F12 → Application → Cookies) to see cookies being set and removed in real-time.</p>
    <p class="tip">Note: Cookies may only appear after the page reloads in some browsers, because they are sent via HTTP headers.</p>
</body>

</html>