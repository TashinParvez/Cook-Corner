<?php
include("/Cook-Corner/Includes/Database Connection/database_connection.php");

if (isset($_POST['submit'])) { // submit btn name

    if ($_FILES['image']['error'] === 0) {

        $tempname = $_FILES['image']['tmp_name'];

        // Get original file name and extension
        $file_name = $_FILES['image']['name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION); // Get file extension

        // Generate a unique name for the uploaded file
        $new_file_name = uniqid('', true) . '.' . $file_ext;

        // Target directory for the image upload
        $upload_dir = '../../Images/Books/';
        $target_file = $upload_dir . $new_file_name;

        // Ensure upload directory exists
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // SQL query using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO `image_upload_table` (`file_name`) VALUES (?)");
        $stmt->bind_param('s', $new_file_name); // Bind file name to query

        // Move the file and store the name in the database
        if (move_uploaded_file($tempname, $target_file)) {
            if ($stmt->execute()) {
                echo "File Uploaded and Saved Successfully!";
            } else {
                echo "Failed to save file in the database.";
            }
        } else {
            echo "Failed to upload file.";
        }
        $stmt->close(); // Close prepared statement
    } else {
        echo "Error uploading file: " . $_FILES['image']['error'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>

    <div class="row col-8 mx-auto mt-5">
        <form method="post" action="Upload.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile" name="image">
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
    </div>

    <div> <!-- Show image after upload -->
        <?php
        $sql = "SELECT * FROM `image_upload_table` ORDER BY id DESC LIMIT 1;";

        $resultantLabel = mysqli_query($conn, $sql);   // get query result

        if ($resultantLabel && mysqli_num_rows($resultantLabel) > 0) {
            // Fetch result as associative array
            $image = mysqli_fetch_assoc($resultantLabel);

            // Display the image
            echo '<img src="../../Images/Books/' . $image['file_name'] . '" alt="Uploaded Image" class="img-fluid">';
        } else {
            echo "No image uploaded yet.";
        }
        ?>
    </div>

</body>

</html>