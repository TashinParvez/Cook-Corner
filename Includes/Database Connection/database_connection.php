<?php

// connect database
$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'Cook_corner';

// connection obj
$conn = mysqli_connect($servername, $username, $password, $databasename);

// check connection
if (!$conn) {
    die("Sorry failed to connect: " . mysqli_connect_error());
}

?>