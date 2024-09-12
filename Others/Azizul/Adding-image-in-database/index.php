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

$image = '';
$error = '';

if (isset($_POST['submit'])) {


    // check full name
    if (empty($_POST['image'])) {
        $error = 'Input field cannot be empty!';
    }

    if ($error == '') {

        // escape sql chars
        $image = mysqli_real_escape_string($conn, $_POST['image']);
       
        // create sql
        $sql = "INSERT INTO image(file) VALUES('$image')";

        // save to db and check
        if (mysqli_query($conn, $sql)) {
            // success
            echo "Image uploaded successfully!";
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
    <title>Document</title>
</head>

<body>
    <section class="container grey-text">
        <h4 class="center">Upload Data</h4>
        <form class="white" action="index.php" method="POST">
            <div>
                <label for="image">Image</label>
                <!-- <input type="file" name="image" value="<?php echo htmlspecialchars($image) ?>"> -->
                <input type="file" id="image" name="image" value="">
            </div>

            <div class="red-text"><?php echo $error; ?></div>

            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">

            <div class="center login">
                <a href="showing_data.php">Data</a>
            </div>
            </div>
        </form>
    </section>
</body>

</html>