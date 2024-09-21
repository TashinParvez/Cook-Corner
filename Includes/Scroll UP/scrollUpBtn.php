<button id="scrollToTopBtn" class="btn">
    &#8679;
</button>

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
