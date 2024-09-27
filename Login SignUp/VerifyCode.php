<?php
if (isset($_POST['resetPassword'])) {
    $code = $_POST['code'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT); // Hash the password
    $conn = new mysqli('localhost', 'username', 'password', 'cook_corner');

    // Check if the code matches
    $query = "SELECT * FROM user_info WHERE code='$code'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Code matches, update the password
        $updateQuery = "UPDATE user_info SET password='$new_password', code=NULL WHERE code='$code'";
        if ($conn->query($updateQuery) === TRUE) {
            echo 'Password has been reset successfully!';
        } else {
            echo 'Error updating password: ' . $conn->error;
        }
    } else {
        echo 'Invalid code. Please try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="VerifyCode.css">
</head>

<body>
    <div class="wrapper">
        <form action="verify_code.php" method="post">
            <h1>Enter Code & New Password</h1>
            <div class="input-box">
                <input type="text" name="code" placeholder="6-digit code" required>
            </div>
            <div class="input-box">
                <input type="password" name="new_password" placeholder="New password" required>
            </div>

            <div>
                <button class="btn" type="submit" name="resetPassword">Reset Password</button>
            </div>
        </form>
    </div>
</body>

</html>