
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