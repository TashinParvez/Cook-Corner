<!doctype html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .loading-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
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

    <div class="loading-container">
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