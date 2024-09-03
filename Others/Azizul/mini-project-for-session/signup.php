<?php

// connect database
$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'session_project';

// connection obj
$conn = mysqli_connect($servername, $username, $password, $databasename);

// check connection
if (!$conn) {
    die("Sorry failed to connect: " . mysqli_connect_error());
}

$name = $username = $password = '';
$error = '';

if (isset($_POST['submit'])) {


    // check full name
    if (empty($_POST['name'])) {
        $error = 'None input field can be empty!';
    }

    // check username
    if (empty($_POST['username'])) {
        $error = 'None input field can be empty!';
    } else {
        // Duplication checking for user handle
        $sql = "SELECT username FROM info WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $error = 'Please try another username';
        }
    }

    // check password
    if (empty($_POST['password'])) {
        $error = 'None input field can be empty!';
    }

    if ($error = '') {

        // escape sql chars
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // create sql
        $sql = "INSERT INTO info(name, username, password) VALUES('$name', '$username', '$password')";

        // save to db and check
        if (mysqli_query($conn, $sql)) {
            // success
            header('Location: login.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
        // close connection
        mysqli_close($conn);
    }
} // end POST check

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>

<body>
    <section class="container grey-text">
        <h4 class="center">Sign Up</h4>
        <form class="white" action="signup.php" method="POST">
            <div>
                <label>Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
            </div>

            <div>
                <label>Username</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>">
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
            </div>

            <div class="red-text"><?php echo $error; ?></div>

            <input type="submit" name="submit" value="sign up" class="btn brand z-depth-0">

            <div class="center login">
                <span>Already have an account? </span>
                <a href="login.php">Login</a>
            </div>
            </div>
        </form>
    </section>
</body>

</html>