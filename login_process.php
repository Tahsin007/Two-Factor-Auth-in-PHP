<?php
session_start();
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
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Retrieve hashed password from the database based on the provided email
    $sql = "SELECT hashvalue FROM students WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedHashedPassword = $row["hashvalue"];

        if(strcmp($hashed_password,$storedHashedPassword)){
            echo " Login Successful , Welcome ";
            $_SESSION['user_email'] = $email;
            header("Location: sendOtp.php");
        }
        else {
            echo "Invalid email or password. Please try again.";
        }
    } else {
        echo "Invalid email or password. Please try again.";
    }
}

$conn->close();
