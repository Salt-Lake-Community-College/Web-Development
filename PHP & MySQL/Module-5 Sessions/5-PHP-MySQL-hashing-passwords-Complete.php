<?php
session_start(); // Start session

$usernameErr = $passwordErr = "";
$username = $password = "";
$loginSuccess = false;

// Step 1. Create a variable to store the hashed password
$hashedPassword = "";

// Function to sanitize input
function cleanInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate username
    if (empty($_POST['username'])) {
        $usernameErr = "Username is required.";
    } else {
        $username = cleanInput($_POST['username']);
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $usernameErr = "Only letters and numbers allowed.";
        }
    }

    // Validate password
    if (empty($_POST['password'])) {
        $passwordErr = "Password is required.";
    } else {
        $password = cleanInput($_POST['password']);
    }

    // Step 2. If valid, hash password and log in user
    if ($usernameErr === "" && $passwordErr === "") {

        // A) Hash the password securely with password_hash(), use the PASSWORD_DEFAULT algorithm
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // B) Store the username in the session to remember the logged-in user
        $_SESSION['username'] = $username;

        // C) Store the hashed password in the session (for demo; normally save in DB)
        $_SESSION['hashedPassword'] = $hashedPassword;

        // D) Mark login as successful
        $loginSuccess = true;
    }
}

// Handle logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    $loginSuccess = false;
    $username = "";

    // 3. Clear the hashed password variable on logout
    $hashedPassword = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Password Hashing Demo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2em;
            background-color: #f5f5f5;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-group {
            margin-bottom: 1.5em;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 0.3em;
        }

        input {
            width: 100%;
            padding: 0.5em;
            box-sizing: border-box;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 0.2em;
            display: block;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .info {
            background-color: #e8f0fe;
            padding: 1em;
            border-radius: 6px;
            margin-top: 1em;
            word-wrap: break-word;
        }

        button {
            padding: 0.5em 1em;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Password Hashing Demo</h1>

        <?php if (!isset($_SESSION['username'])): ?>
            <!-- Login Form -->
            <form method="post" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo $username; ?>">
                    <?php if ($usernameErr) echo "<span class='error'>$usernameErr</span>"; ?>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                    <?php if ($passwordErr) echo "<span class='error'>$passwordErr</span>"; ?>
                </div>

                <button type="submit">Login & Hash Password</button>
            </form>
        <?php else: ?>
            <!-- Logged-in message -->
            <p class="success">Welcome, <?php echo $_SESSION['username']; ?>! You are logged in.</p>

            <!-- 4. View Hashed Password () -->
            <div class="info">
                <strong>Original Password:</strong> <?php echo $password; ?><br>
                <strong>Hashed Password (with salt):</strong> <?php echo $_SESSION['hashedPassword']; ?>
            </div>

            <!-- Logout -->
            <form method="post" style="margin-top: 1em;">
                <button type="submit" name="logout">Logout</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>