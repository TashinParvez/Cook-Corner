<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Newsletter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            /* Light background color for contrast */
        }

        .newsletter-container {
            margin-left: 280px;
            /* Adjusted margin for the sidebar */
            padding: 2rem;
            /* General padding */
        }

        .email-list {
            max-height: 400px;
            /* Limit height for the email list */
            overflow-y: auto;
            /* Enable scrolling */
            background-color: #fff;
            /* White background for the email list */
            border-radius: 8px;
            /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            margin-bottom: 2rem;
            /* Space between email list and button */
        }

        .email-item {
            padding: 1rem;
            /* Padding inside each email item */
            border-bottom: 1px solid #dee2e6;
            /* Bottom border */
            cursor: pointer;
            /* Pointer cursor for clickable items */
        }

        .email-item:hover {
            background-color: #f1f1f1;
            /* Light hover effect */
        }

        .send-button {
            width: 100%;
            /* Full width button */
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Include the sidebar -->
        <?php include '/Cook-Corner/Admin Panel/Includes/sidebar.php'; ?>

        <!-- Main content area -->
        <div class="container newsletter-container">
            <h2 class="mb-4">Send Newsletter</h2>
            <div class="email-list">
                <!-- Sample email items -->
                <div class="email-item">example1@example.com</div>
                <div class="email-item">example2@example.com</div>
                <div class="email-item">example3@example.com</div>
                <div class="email-item">example4@example.com</div>
                <div class="email-item">example5@example.com</div>
                <div class="email-item">example6@example.com</div>
                <div class="email-item">example7@example.com</div>
                <div class="email-item">example8@example.com</div>
                <div class="email-item">example9@example.com</div>
                <div class="email-item">example10@example.com</div>
            </div>

            <button class="btn btn-primary send-button" id="sendNewsletterBtn">Send Newsletter</button>
        </div>
    </div>

    <script>
        // Example function to send the newsletter
        document.getElementById('sendNewsletterBtn').addEventListener('click', function() {
            alert('Newsletter sent to all listed emails!');
        });
    </script>
</body>

</html>