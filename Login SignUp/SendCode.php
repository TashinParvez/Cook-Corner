<?php
// Load the Composer autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['sendCode'])) {
    $recipientEmail = $_POST['email']; // Get the email from the form input
    $code = rand(100000, 999999); // Generate a random 6-digit code

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                         // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to use Gmail
        $mail->SMTPAuth   = true;                                // Enable SMTP authentication
        $mail->Username   = 'cookcornerinfo@gmail.com';          // Your Gmail address
        $mail->Password   = 'ikxf ujvj agrk jmgy';               // Your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable TLS encryption
        $mail->Port       = 587;                                 // TCP port to connect

        //Recipients
        $mail->setFrom('cookcornerinfo@gmail.com', 'Cook Corner'); // Your email and display name
        $mail->addAddress($recipientEmail);                       // Add recipient email

        // Content
        $mail->isHTML(true);                                     // Set email format to HTML
        $mail->Subject = 'Your Reset Code';
        $mail->Body    = "Your password reset code is: <b>$code</b>";

        $mail->send();

        // Redirect to the VerifyCode.php page after sending the email
        // header("Location: VerifyCode.php?email=" . urlencode($recipientEmail) . "&code=$code");
        header("Location: VerifyCode.php");
        exit(); // Ensure no further code is executed
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="SendCode.css">
</head>

<body>
    <div class="wrapper">
        <form action="SendCode.php" method="post">
            <h1>Reset Password</h1>
            <div class="input-box">
                <input type="email" name="email" placeholder="Your email" required>
            </div>
            <div>
                <button class="btn" type="submit" name="sendCode">Send Code</button>
            </div>
        </form>
    </div>
</body>

</html>