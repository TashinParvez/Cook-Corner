<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Scroll to top button */
        #scrollToTopBtn {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Fixed position at the bottom right */
            bottom: 20px;
            left: 20px;
            z-index: 99;
            /* Ensure it's above other content */
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #ff5252;
            /* Bootstrap primary color */
            color: white;
            cursor: pointer;
            padding: 6px 14px;
            border-radius: 50%;

        }

        #scrollToTopBtn:hover {
            background-color: #ff5252;
            /* Darken the color when hovered */
        }
    </style>
</head>

<body>
    <button id="scrollToTopBtn" class="btn">
        <i class="fa-solid fa-arrow-up-long"></i>
    </button>
</body>

</html>



<script>
    // Get the button
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');

    // When the user scrolls down 100px from the top of the document, show the button
    window.onscroll = function() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            scrollToTopBtn.style.display = "block";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    };

    // When the user clicks on the button, scroll to the top of the document
    scrollToTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Smooth scrolling
        });
    });
</script>