<?php


//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");

$user_id = "5";


// ---------- For hero segment ---------------
$sql = "SELECT 
            c.course_id,
            c.course_title,
            c.description,
            c.price,
            c.rating,
            c.image,
            COUNT(jctu.user_id) AS enrolled_user_count,
            IF(EXISTS(
                SELECT 1 
                FROM `junction_course_taken_user` jctu2
                WHERE jctu2.user_id = '$user_id' 
                AND jctu2.course_id = c.course_id
            ), 1, 0) AS found
        FROM 
            course c
        LEFT JOIN 
            junction_course_taken_user jctu 
            ON c.course_id = jctu.course_id
        WHERE 
            c.course_id = 1
        GROUP BY 
            c.course_id;
";

$resultantLabel = mysqli_query($conn, $sql);

$heropage = mysqli_fetch_assoc($resultantLabel);
// print_r($heropage);

// $heropage = 1;
// print_r($heropage[0][0]);
// print($heropage);



// ---------- For Enrolled segment ---------------
$sql = "SELECT *
        FROM (
                SELECT * 
                FROM `junction_course_taken_user` 
                WHERE user_id = '$user_id') 
        as taken_course 
        INNER JOIN
        course
        ON 
        taken_course.course_id = course.course_id;";

$resultantLabel = mysqli_query($conn, $sql);
$enrolled = mysqli_fetch_all($resultantLabel);

$enrolledCourseCount = count($enrolled);
// print($enrolledCourseCount);


$sql = "SELECT 
            c.course_id,
            c.course_title,
            c.description,
            c.price,
            c.rating,
            c.image,
            COUNT(jctu.user_id) AS enrolled_user_count
        FROM 
            course c
        LEFT JOIN 
            junction_course_taken_user jctu 
            ON c.course_id = jctu.course_id
        WHERE 
            NOT EXISTS (
                SELECT 1 
                FROM junction_course_taken_user jctu2 
                WHERE jctu2.course_id = c.course_id 
                AND jctu2.user_id = $user_id
            )
        GROUP BY 
            c.course_id;
";

$all_course_result =  mysqli_query($conn, $sql);
$all_courses = mysqli_fetch_all($all_course_result);
// print_r($all_courses);


mysqli_free_result($resultantLabel);
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooking Class</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->

    <!-- css  -->
    <link href="allCourses.css" rel="stylesheet" type="text/css">

</head>


<body>

    <?php
    include('../Includes/Navbar/navbarMain.php');  // tashin
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>
    <!-- ============================== Course section ==================================== -->
    <div class="container">


        <!-- Hero Segment -->
        <?php
        if ($heropage['found'] == 0) {
        ?>
            <section class="cooking-class">
                <div class="class-info">
                    <h1><?php echo htmlspecialchars($heropage['course_title']); ?><br>Explore new Recipe</h1>
                    <p>Want to cook like a chef? Our cooking online courses offer step-by-step guidance and expert tips to
                        transform your cooking. Join us now!</p>
                    <a href="#" class="btn" onclick="submitAllCourseForm(<?php echo $heropage['course_id']; ?>)">Enrol Now</a>
                </div>
            </section>
        <?php
        }
        ?>

        <!-- enrolled Courses -->
        <?php
        if ($enrolledCourseCount  != 0) {
        ?>

            <section class="course m-4">
                <div class="container">
                    <div class="identity m-2">
                        <h3 class="m-0 p-0 text-center">Enrolled Courses</h3>
                    </div>

                    <div class="row row-cols-1 row-cols-md-4 g-4">



                        <div class="col">
                            <a href="oneCourseView.php" class="text-decoration-none">
                                <div class="card">
                                    <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col d-flex justify-content-between">
                                                <div>Tk 150</div>
                                                <div class="ratings">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="card-text mb-0">How to cook rice in home</p>
                                        <p class="card-text"><i class="fa-solid fa-users "></i> 69 student enroled</p>
                                    </div>
                                </div>
                            </a>
                        </div>


                    </div>
            </section>

        <?php
        }
        ?>


        <!-- All Courses -->
        <section class="course m-4">
            <div class="container">
                <div class="identity m-2">
                    <h3 class="m-0 p-0 text-center">Our Courses</h3>

                    <script>
                        function submitAllCourseForm(course_id) {
                            const form = document.getElementById('allCorsesForm');
                            form.action = 'courseEnrollPage.php?course_id=' + course_id;
                            form.submit();
                        }
                    </script>

                    <form id="allCorsesForm" action="courseEnrollPage.php" method="post">
                        <!-- No hidden input needed -->
                    </form>
                    <div class="row">
                        <?php foreach ($all_courses as $course) { ?>

                            <!-- course_id, course_title, description, price, rating, image, enrolled_user_count -->
                            <div class="col-md-4">
                                <a href="#" class="text-decoration-none" onclick="submitAllCourseForm(<?php echo $course[0]; ?>)">
                                    <div class="card">
                                        <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col d-flex justify-content-between">
                                                    <div><?php echo $course[3]; ?></div>
                                                    <div class="ratings">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="card-text mb-0"><?php echo $course[1]; ?></p>
                                            <p class="card-text"><i class="fa-solid fa-users "></i> <?php echo $course[6] . ' '; ?> student enroled</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                        <!-- <div class="col">
                        <a href="#" class="text-decoration-none">
                            <div class="card">
                                <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col d-flex justify-content-between">
                                            <div>Tk 150</div>
                                            <div class="ratings">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0">How to cook rice in home</p>
                                    <p class="card-text"><i class="fa-solid fa-users "></i> 69 student enroled</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-decoration-none">
                            <div class="card">
                                <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col d-flex justify-content-between">
                                            <div>Tk 150</div>
                                            <div class="ratings">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0">How to cook rice in home</p>
                                    <p class="card-text"><i class="fa-solid fa-users "></i> 69 student enroled</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-decoration-none">
                            <div class="card">
                                <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col d-flex justify-content-between">
                                            <div>Tk 150</div>
                                            <div class="ratings">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0">How to cook rice in home</p>
                                    <p class="card-text"><i class="fa-solid fa-users "></i> 69 student enroled</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-decoration-none">
                            <div class="card">
                                <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col d-flex justify-content-between">
                                            <div>Tk 150</div>
                                            <div class="ratings">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0">How to cook rice in home</p>
                                    <p class="card-text"><i class="fa-solid fa-users "></i> 69 student enroled</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-decoration-none">
                            <div class="card">
                                <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col d-flex justify-content-between">
                                            <div>Tk 150</div>
                                            <div class="ratings">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0">How to cook rice in home</p>
                                    <p class="card-text"><i class="fa-solid fa-users "></i> 69 student enroled</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-decoration-none">
                            <div class="card">
                                <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col d-flex justify-content-between">
                                            <div>Tk 150</div>
                                            <div class="ratings">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0">How to cook rice in home</p>
                                    <p class="card-text"><i class="fa-solid fa-users "></i> 69 student enroled</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-decoration-none">
                            <div class="card">
                                <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col d-flex justify-content-between">
                                            <div>Tk 150</div>
                                            <div class="ratings">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0">How to cook rice in home</p>
                                    <p class="card-text"><i class="fa-solid fa-users "></i> 69 student enroled</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-decoration-none">
                            <div class="card">
                                <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col d-flex justify-content-between">
                                            <div>Tk 150</div>
                                            <div class="ratings">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0">How to cook rice in home</p>
                                    <p class="card-text"><i class="fa-solid fa-users "></i> 69 student enroled</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-decoration-none">
                            <div class="card">
                                <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col d-flex justify-content-between">
                                            <div>Tk 150</div>
                                            <div class="ratings">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0">How to cook rice in home</p>
                                    <p class="card-text"><i class="fa-solid fa-users "></i> 69 student enroled</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="text-decoration-none">
                            <div class="card">
                                <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col d-flex justify-content-between">
                                            <div>Tk 150</div>
                                            <div class="ratings">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0">How to cook rice in home</p>
                                    <p class="card-text"><i class="fa-solid fa-users "></i> 69 student enroled</p>
                                </div>
                            </div>
                        </a>
                    </div> -->
                    </div>
                </div>


        </section>

    </div>


    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>