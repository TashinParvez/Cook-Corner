<!DOCTYPE html>
<html>

<head>
    <title>Floating Action Button in CSS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .fab-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            cursor: pointer;
        }

        .fab-icon-holder {
            width: 40px;
            height: 40px;
            border-radius: 100%;
            background: teal;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .fab-icon-holder:hover {
            opacity: 0.8;
        }

        .fab-icon-holder i {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            font-style: 25px;
            color: #fff;
        }

        .fab-icon-holder a {
            text-decoration: none;
            color: white;
        }

        .fab {
            width: 40px;
            height: 40px;
            background: #d23f31;
        }

        .fab-options {
            list-style-type: none;
            margin: 0;
            position: absolute;
            bottom: 50px;
            right: -5px;
            opacity: 0;
            transition: all 0.3s ease;
            transform: scale(0);
            transform-origin: 85% bottom;
        }

        .fab:hover+.fab-options,
        .fab-options:hover {
            opacity: 1;
            transform: scale(1);
        }

        .fab-options li {
            display: flex;
            justify-content: flex-end;
            padding: 5px;
        }

        .fab-label {
            padding: 2px 5px;
            align-self: center;
            user-select: none;
            white-space: nowrap;
            border-radius: 3px;
            font-size: 16px;
            /* background: #666; */
            color: #fff;
            /* box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2); */
            margin-right: 10px;
        }

        .fab-label a {
            text-decoration: none;
            color: black;

        }
    </style>
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