<!DOCTYPE html>
<html>

<head>
    <title>Floating Action Button in CSS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <div class="fab-container">
        <div class="fab fab-icon-holder">
            <i class="fa-solid fa-plus"></i>
        </div>

        <ul class="fab-options">
            <li>
                <span class="fab-label"><a href="#">Add Recipe</a></span>
                <div class="fab-icon-holder">
                    <a href="#"><i class="fa-solid fa-bowl-rice"></i></a>
                </div>
            </li>
            <li>
                <span class="fab-label"><a href="#">Add Tips</a></span>
                <div class="fab-icon-holder">
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                </div>
            </li>
        </ul>
    </div>
</body>

</html>