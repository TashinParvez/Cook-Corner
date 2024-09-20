<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scroll to Top</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Scroll to top button */
        #scrollToTopBtn {
            display: none; /* Hidden by default */
            position: fixed; /* Fixed position at the bottom right */
            bottom: 20px;
            right: 20px;
            z-index: 99; /* Ensure it's above other content */
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            cursor: pointer;
            padding: 10px 15px;
            border-radius: 50%;
        }

        #scrollToTopBtn:hover {
            background-color: #0056b3; /* Darken the color when hovered */
        }
    </style>
</head>

<body>

    <!-- Add some content to scroll through -->
    <div class="container">
        <h1>Scroll Down to See the Button</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
        <p>Keep scrolling...</p>
        <div style="height: 1500px;">
            <!-- Filler content to allow scrolling -->
        </div>
    </div>

    <!-- Scroll to top button -->
    <button id="scrollToTopBtn" class="btn">
        &#8679; <!-- Unicode for up arrow -->
    </button>

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

</body>

</html>
