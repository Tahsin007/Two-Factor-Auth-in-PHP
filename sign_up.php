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
        <h2>Sign Up</h2>
        <form class="signup-form" action="/sign_up_process.php" method="post">
            <label for="username">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" onkeyup="validatePassword()" required>

            <div id="lengthError" style="color: red; display: none; font-size:12px;">Password must be 8 characters long and need atleast a special character,a Capital letter.</div>
            <!-- <div id="capitalLetterError" style="color: red; display: none;">Password must include at least one capital letter</div>
            <div id="specialCharacterError" style="color: red; display: none;">Password must include at least one special character</div> -->
            <br>
            <button type="submit">Sign Up</button>
        </form>

        <p class="or">
            OR
        </p>

        <!-- Login button -->
        <!-- <button class="login-button" onclick="window.location.href='login.php'">Login</button> -->
        <a href="/login.php" class="login-button">Log in</a>
    </div>

</body>
<script>
    function validatePassword() {
        var password = document.getElementById("password").value;

        var lengthValid = password.length >= 8;
        var capitalLetterValid = /[A-Z]/.test(password);
        var specialCharacterValid = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/.test(password);

        if (lengthValid && capitalLetterValid && specialCharacterValid) {
            document.getElementById("lengthError").style.display = "none";
        } else {
            document.getElementById("lengthError").style.display = "block";
        }
        // document.getElementById("lengthError").style.display = lengthValid ? "none" : "block";
        // document.getElementById("capitalLetterError").style.display = capitalLetterValid ? "none" : "block";
        // document.getElementById("specialCharacterError").style.display = specialCharacterValid ? "none" : "block";
    }
</script>

</html>