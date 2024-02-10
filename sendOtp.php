sendmail.txt
<?php
session_start();
include('smtp/PHPMailerAutoload.php');
$userEmail = $_SESSION['user_email'] ?? '';

// Check if the email is not empty
if (empty($userEmail)) {
    die("Invalid email");
}
echo $userEmail;

$otp = rand(100000, 999999);
// $receiverEmail = "mamun.nstu.15@gmail.com";
$subject = "Email Verification";
$emailbody = "Your 6 digit otp code is: ";

//Otp save on database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "security project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO otp (code) VALUES ('$otp')";
if ($conn->query($sql) === TRUE) {
    echo "Otp is saved";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


echo smtp_mailer($userEmail, $subject, $emailbody.$otp);

function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "tahsinahmed.iit@gmail.com"; // Sender's Email
    $mail->Password = "nfsrotaeyseoabjw"; //Sender's Email App Password
    $mail->SetFrom("tahsinahmed.iit@gmail.com"); // Sender's Email
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {
        echo "We have sent 6 digit otp code to your email";
        header("Location: otpUI.php");
    }
}
?>