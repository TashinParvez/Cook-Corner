<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bordered Container with Title</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .bordered-container {
            position: relative;
            border: 2px solid #000; /* Border around the container */
            padding: 20px;
            margin-top: 30px;
        }

        .title-on-border {
            position: absolute;
            top: -15px; /* Position the title above the border */
            left: 50%;
            transform: translateX(-50%);
            background-color: #fff; /* Background color for the title */
            padding: 0 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <!-- The title is placed above the container's border -->
        <div class="bordered-container">
            <div class="title-on-border">Title</div>
            <p>Content goes here inside the rectangular container.</p>
        </div>
    </div>

</body>
</html>
