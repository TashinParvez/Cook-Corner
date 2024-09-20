<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->

    <!-- Custom CSS -->
    <link href="oneCourseView.css" rel="stylesheet" type="text/css">


</head>

<body>

    <!-- Navbar -->
    <?php include('../Includes/Navbar/navbarMain.php'); ?>

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1>Healthy Cooking Course</h1>
            <p>Master the art of nutritious and delicious cooking in just 4 weeks</p>
            <a href="#" class="btn btn-primary btn-lg">Enroll Now</a>
        </div>
    </div>

    <!-- Course Details Section -->
    <div class="container my-5">
        <div class="row">
            <!-- Left Column: Course Information -->
            <div class="col-md-8">
                <h2>About the Course</h2>
                <p class="lead">Learn how to prepare delicious and healthy meals tailored to your dietary needs, including tips for managing diabetes, hypertension, and weight.</p>

                <h4>What You Will Learn</h4>
                <ul>
                    <li>Balanced meal preparation for health conditions</li>
                    <li>Nutrition basics and meal planning</li>
                    <li>Healthy alternatives for everyday ingredients</li>
                    <li>Quick and easy recipes</li>
                </ul>

                <h4>Course Duration & Schedule</h4>
                <p>4 Weeks | 3 Sessions per Week</p>

                <h4>Instructor</h4>
                <p><strong>Chef Sarah Johnson</strong>, a renowned nutritionist and chef, will guide you through the process of making healthy yet tasty meals, providing her insights from 10+ years of experience.</p>

                <h4>Pricing</h4>
                <p><strong>$49.99</strong> for the entire course</p>

                <a type="button" class="btn btn-primary btn-lg mt-4">Enroll Now</a>
            </div>

            <!-- Right Column: Highlights and FAQs -->
            <div class="col-md-4">
                <!-- Course Highlights Card -->
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h4>Course Highlights</h4>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-laptop"></i> 100% Online</li>
                            <li><i class="bi bi-check-circle"></i> Personalized Meal Plans</li>
                            <li><i class="bi bi-folder"></i> Access to Recipe Database</li>
                        </ul>
                    </div>
                </div>

                <!-- FAQs Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">FAQs</h5>
                        <ul>
                            <li><strong>What materials do I need?</strong> - Basic kitchen tools and ingredients.</li>
                            <li><strong>How is the course delivered?</strong> - Live online sessions via Zoom.</li>
                            <li><strong>Is there support after the course?</strong> - Yes, you’ll have lifetime access to our cooking community.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('../Includes/Footer/footermain.php'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>