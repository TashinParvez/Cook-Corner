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
        <form action="VerifyCode.php" method="post">
            <h1>Reset Password</h1>
            <div class="input-box">
                <input type="text" name="code" placeholder="6-digit code" required>
            </div>
            <div class="input-box">
                <input type="password" name="new_password" placeholder="New password" required>
            </div>
            <div class="input-box">
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>

            <div>
                <button class="btn" type="submit" name="resetPassword">Reset Password</button>
            </div>
        </form>
    </div>
</body>

</html>