<?php
// Database table name:  

//...................... Database Connection ..............................
// include("../Includes/Database Connection/database_connection.php");


// sql query
// $sql = " ";

// $resultantLabel = mysqli_query($conn, $sql);   // get query result

// $labels = mysqli_fetch_all($resultantLabel);   // conver to array

// mysqli_free_result($resultantLabel);
// mysqli_close($conn);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />


    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <style>
    .loading-container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: white;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        z-index: 9999;
    }

    .spinners {
        margin-top: 9px;
    }

    .spinner-grow-custom {
        width: 1rem;
        height: 1rem;
        opacity: 0.7;
    }
</style>


</head>


<body>
 <!-- spinner.php -->
<div class="loading-container" id="loadingSpinner">
    <!-- Logo -->
    <div class="logo">
        <img src="/Images/logo/cook_Corner_LOGO-removebg-mainPartOnly.png" alt="Your Website Logo" width="150">
    </div>

    <!-- Spinners -->
    <div class="spinners">
        <div class="spinner-grow spinner-grow-custom text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-secondary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-success" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-warning" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-info" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-light" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-dark" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>




</body>

</html>