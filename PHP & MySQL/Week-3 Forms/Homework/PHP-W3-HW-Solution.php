<!DOCTYPE html>
<html>
<head>
    <title>Week 3 Homework: Survey Form Design</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Survey Form</h1>
    <!-- Add PHP Form Validation -->
    <?php
    // Declare Variables
    $name = $email = $age = $gender = $country = $comments = "";
    $interests = array();
    $nameErr = $emailErr = $ageErr = $genderErr = $formErr = "";

    // Sanatize Data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $age = test_input($_POST["age"]);
        $gender = test_input($_POST["gender"]);
        $country = test_input($_POST["country"]);
        $comments = test_input($_POST["comments"]);
        $interests = isset($_POST["interests"]) ? $_POST["interests"] : array();

        // Validate Data
        if (empty($name)) {
            $nameErr = "Name is required";
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Valid email is required";
        }
        if (empty($age) || !is_numeric($age)) {
            $ageErr = "Age is required and must be a number";
        }
        if (empty($gender)) {
            $genderErr = "Gender is required";
        }

        if (empty($nameErr) && empty($emailErr) && empty($ageErr) && empty($genderErr)) {
            echo "<p>Thank you for your submission!</p>";
            $name = $email = $age = $gender = $country = $comments = "";
            $interests = array();
        } else {
            $formErr = "Please fill in all required fields correctly.";
        }
    }

    // Sanatization Function
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

<!-- Survey Form -->
<!-- Update Form Action & Form Method -->
<!-- Update to Display Errors & Success Messages -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name;?>" required>
        <span class="error"><?php echo $nameErr;?></span><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email;?>" required>
        <span class="error"><?php echo $emailErr;?></span><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo $age;?>" required>
        <span class="error"><?php echo $ageErr;?></span><br><br>

        <label>Gender:</label>
        <div class="radio-group">
            <input type="radio" id="male" name="gender" value="male" <?php if (isset($gender) && $gender=="male") echo "checked";?>>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female" <?php if (isset($gender) && $gender=="female") echo "checked";?>>
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="other" <?php if (isset($gender) && $gender=="other") echo "checked";?>>
            <label for="other">Other</label>
        </div>
        <span class="error"><?php echo $genderErr;?></span><br><br>

        <label for="interests">Interests:</label>
        <div class="radio-group">
            <input type="checkbox" id="sports" name="interests[]" value="sports" <?php if (in_array("sports", $interests)) echo "checked";?>>
            <label for="sports">Sports</label>
            <input type="checkbox" id="music" name="interests[]" value="music" <?php if (in_array("music", $interests)) echo "checked";?>>
            <label for="music">Music</label>
            <input type="checkbox" id="travel" name="interests[]" value="travel" <?php if (in_array("travel", $interests)) echo "checked";?>>
            <label for="travel">Travel</label>
        </div>
        <br><br>

        <label for="country">Country:</label>
        <select id="country" name="country">
            <option value="usa" <?php if (isset($country) && $country=="usa") echo "selected";?>>United States</option>
            <option value="canada" <?php if (isset($country) && $country=="canada") echo "selected";?>>Canada</option>
            <option value="uk" <?php if (isset($country) && $country=="uk") echo "selected";?>>United Kingdom</option>
        </select><br><br>

        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments" rows="4"><?php echo $comments;?></textarea><br><br>

        <input type="submit" value="Submit">
    </form>

<!-- Add Form Response -->
    <div id="form-response">
        <?php echo $formErr;?>
    </div>
</body>
</html>
