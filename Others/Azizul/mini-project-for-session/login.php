<?php

$username = $password = '';
$error = '';

if (isset($_POST['submit'])) {


    $username = $_POST['username'];
    $password = $_POST['password'];

    //empty field check
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = 'Invalid username or password';
    }

    // .......... validation check ............

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

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    //write query for username and password
    $sql = "SELECT username FROM info WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $sql);

    //get the result 
    if (!$result) {
        $error = 'Invalid username or password';
    }

    $username = mysqli_fetch_assoc($result);

    // free the $result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

    if ($error = '') {

        session_start();
        $_SESSION['username'] = $username;

        header("Location: home.php");
    }
}

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
        <h4 class="center">Log In</h4>
        <form class="white" action="login.php" method="POST">

            <div>
                <label>Username</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>">
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
            </div>

            <div class="red-text"><?php echo $error; ?></div>

            <input type="submit" name="submit" value="Log In" class="btn brand z-depth-0">

            <div class="center sign-up">
                <span>Don't have an account? </span>
                <a href="signup.php">Sign Up</a>
            </div>
            </div>
        </form>
    </section>
</body>

</html>