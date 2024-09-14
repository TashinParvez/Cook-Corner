<?php

// connect database
$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'image_upload';

// connection obj
$conn = mysqli_connect($servername, $username, $password, $databasename);

// check connection
if (!$conn) {
    die("Sorry failed to connect: " . mysqli_connect_error());
}

//write query for username and password
$sql = "SELECT file FROM image";

$result = mysqli_query($conn, $sql);
$images = mysqli_fetch_all($result);

// print_r($images);

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
    <title>Document</title>
</head>

<body>
    <?php foreach ($images as $image) { ?>
        <div>
            <img alt="image not found" src="/img<?php echo $image[0] ?>" />
        </div>
    <?php } ?>
</body>

</html>