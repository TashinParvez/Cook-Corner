<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expandable Button</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .btn-container {
            position: relative;
            overflow: hidden;
        }

        .expandable-btn {
            background-color: #00bcd4;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            transition: width 0.6s ease;
            /* Slowed down the transition to 0.6 seconds */
            display: flex;
            align-items: center;
        }

        .links {
            position: absolute;
            top: 50%;
            left: 100%;
            transform: translateY(-50%);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease, left 0.3s ease;
            white-space: nowrap;
        }

        .btn-container:hover .expandable-btn {
            width: 300px;
        }

        .btn-container:hover .links {
            left: 20%;
            opacity: 1;
            pointer-events: auto;
        }

        .links a {
            display: inline-block;
            color: white;
            padding: 10px 15px;
            margin-left: 5px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease;
        }
    </style>
</head>

<body>

    <div class="btn-container">
        <button class="expandable-btn">
            <i class="fa-solid fa-plus"></i>
        </button>

        <div class="links">
            <a href="#add-recipe">Add Recipe</a>
            <a href="#add-tips">Add Tips</a>
        </div>
    </div>

</body>

</html>