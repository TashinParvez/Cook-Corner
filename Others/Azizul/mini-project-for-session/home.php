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

session_start();
$username = $_SESSION['username'];
$username = mysqli_real_escape_string($conn, $username['username']);

//write query for username and password
$sql = "SELECT name FROM info WHERE username = '$username'";

$result = mysqli_query($conn, $sql);
$name = mysqli_fetch_assoc($result);

// free the $result from memory
mysqli_free_result($result);
// close connection
mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>

<body>
    <div>
        <h3>WELCOME</h3>
        <h1><?php echo $name['name']; ?></h1>
    </div>
</body>

</html>