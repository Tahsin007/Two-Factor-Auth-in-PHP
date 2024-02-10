<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>

</head>

<body>

    <a href="index.html" class="home-button">Home</a>


    <div class="signup-container" id="signup-container">
        <h2>Two-Factor-Authentication</h2>
        <form class="signup-form" action="/login_process.php" method="post">
            <label for="username">Code:</label>
            <input type="text" id="text" name="text" required>

            <button type="submit">Log in</button>
        </form>

        <!-- <p class="or">
            OR
        </p> -->

        <!-- Login button -->
        <!-- <button class="login-button" onclick="window.location.href='index.php'">Sign Up</button> -->
    </div>

</body>

</html>