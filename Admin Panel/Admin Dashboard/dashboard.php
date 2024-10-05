<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="d-flex">
        <!-- Include the sidebar -->
        <?php
        // include '/Cook-Corner/Admin%20Panel/Includes/sidebar.php';
        ?>
        <?php
        // include '/Cook-Corner/Admin Panel/Includes/sidebar.php'; tashin
        include 'D:\All UIU Materials\8th Trimester\SAD Lab\Project\Cook-Corner\Admin Panel\Includes\sidebar.php';
        ?>

        <!-- Main content area -->
        <div class="container p-5" style=" 
            margin-left: 280px;
            padding: 0;">

            <h1>Welcome to the page!</h1>
            <p>This is your main content area.</p>
            <!-- More content goes here -->
        </div>
    </div>
</body>

</html>