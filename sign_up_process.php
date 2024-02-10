<?php
// Establish a database connection (replace with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "security project";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $lengthValid = strlen($password) >= 8;
    $capitalLetterValid = preg_match('/[A-Z]/', $password);
    $specialCharacterValid = preg_match('/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/', $password);

    if ($lengthValid && $capitalLetterValid && $specialCharacterValid){
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO students (email, password,hashvalue) VALUES ('$email','$password','$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        echo "Please enter a valid password";
    }


}

$conn->close();
