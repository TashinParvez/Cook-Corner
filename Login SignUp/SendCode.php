<?php
// Assuming you're using PHPMailer for sending emails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer is installed via Composer

if (isset($_POST['sendCode'])) {
    $email = $_POST['email'];
    $conn = new mysqli('localhost', 'username', 'password', 'cook_corner');

    // Check if email exists in the database
    $query = "SELECT * FROM user_info WHERE email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Generate 6-digit random code
        $code = rand(100000, 999999);

        // Store the code in the database
        $updateQuery = "UPDATE user_info SET code='$code' WHERE email='$email'";
        $conn->query($updateQuery);

        // Send the code via email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'tashinparvez2002@gmail.com'; // Your email
            $mail->Password = 'your_password'; // Your email password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('your_email@example.com', 'Cook Corner');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Code';
            $mail->Body = 'Your password reset code is ' . $code;

            $mail->send();
            echo 'Reset code has been sent to your email.';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        }
    } else {
        echo 'No account found with that email.';
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
    <link rel="stylesheet" href="ForgetPass.css">
</head>

<body>
    <div class="wrapper">
        <form action="send_reset_code.php" method="post">
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