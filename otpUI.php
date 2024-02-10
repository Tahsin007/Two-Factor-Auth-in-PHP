<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "security project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $otp = $_POST["otp"];

    $sql = "SELECT * FROM otp ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $databaseOtp = $row['code'];
        if ($databaseOtp == $otp) {
            echo " Welcome, Your otp is correct. Welcome to the home page. ";
            header("Location: /Homepage/Home.php");
        } else {
            echo "Your otp is not correct";
        }
        // Process the data from the last row
        // print_r($row);
    } else {
        echo "No results found";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>

</head>

<body>

    <a href="index.html" class="home-button">OTP</a>


    <div class="signup-container" id="signup-container">
        <h2>OTP Page</h2>
        <p> We have sent you a 6 digit otp code</p>
        <form class="signup-form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <label for="username">OTP Code:</label>
            <input type="number" id="otp" name="otp" required>

            <button type="submit">Submit</button>
        </form>

        <p class="or">
            OR
        </p>

        <!-- Login button -->
        <button class="login-button" onclick="window.location.href='sign_up.php'">Sign Up</button>
    </div>

</body>

</html>