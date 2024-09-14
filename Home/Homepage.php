<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="Homepage.css">
</head>

<body>
    <!-- <h1 class="navbar">Navbar</h1> -->  
     <?php
    include('../Includes/Navbar/navbarMain.php');  // tashin
    ?>

    <section class="get-start">
        <h1>Hungry? Get started</h1>
        <div class="search">
            <form action="#">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="" id="" placeholder="Search your recipe here">
                <!-- <button type="submit"></button> -->

                <div class="search-items">
                    <span class="items">Chicken</span>
                    <span class="items">Beef</span>
                    <span class="items">Vegetable</span>
                    <span class="items">Fish</span>
                    <span class="items">Cookies</span>
                    <span class="items">Sweet</span>
                    <span class="items">Juice</span>
                </div>
            </form>
        </div>
    </section>


    <section class="suggestion">
        <div class="wishes">
            <h1>Good Morning</h1>
            <p>What to cook Now?</p>
        </div>

        <div class="card-holder">
            <a href="#">
                <div class="recipe-card">
                    <img src="./Images/pasta.jpg" alt="">
                    <div class="card-info">
                        <h3>Pasta</h3>
                        <div class="ratings" style="color: yellow;">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="recipe-card">
                    <img src="./Images/pasta.jpg" alt="">
                    <div class="card-info">
                        <h3>Pasta</h3>
                        <div class="ratings" style="color: yellow;">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="recipe-card">
                    <img src="./Images/pasta.jpg" alt="">
                    <div class="card-info">
                        <h3>Pasta</h3>
                        <div class="ratings" style="color: yellow;">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="recipe-card">
                    <img src="./Images/pasta.jpg" alt="">
                    <div class="card-info">
                        <h3>Pasta</h3>
                        <div class="ratings" style="color: yellow;">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="recipe-card">
                    <img src="./Images/pasta.jpg" alt="">
                    <div class="card-info">
                        <h3>Pasta</h3>
                        <div class="ratings" style="color: yellow;">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
            </a>


        </div>
    </section>


    <section class="courses">

        <div class="course-heading">
            <p>Our cooking Classes</p>
            <h1>Popular Courses</h1>
        </div>

        <div class="card-holder">
            <div class="course-card">
                <img src="./Images/course.jpeg" alt="">
                <div class="price-rating">
                    <div class="price">Tk 150</div>
                    <div class="ratings" style="color: yellow;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <div class="course-info">
                    <h3>How to make breakfast at home</h3>
                    <i class="fa-solid fa-users"></i> 69 <span>Student enrobed</span>
                </div>
            </div>
            <div class="course-card">
                <img src="./Images/course.jpeg" alt="">
                <div class="price-rating">
                    <div class="price">Tk 150</div>
                    <div class="ratings" style="color: yellow;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <div class="course-info">
                    <h3>How to make breakfast at home</h3>
                    <i class="fa-solid fa-users"></i> 69 <span>Student enrobed</span>
                </div>
            </div>
            <div class="course-card">
                <img src="./Images/course.jpeg" alt="">
                <div class="price-rating">
                    <div class="price">Tk 150</div>
                    <div class="ratings" style="color: yellow;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <div class="course-info">
                    <h3>How to make breakfast at home</h3>
                    <i class="fa-solid fa-users"></i> 69 <span>Student enrobed</span>
                </div>
            </div>
            <div class="course-card">
                <img src="./Images/course.jpeg" alt="">
                <div class="price-rating">
                    <div class="price">Tk 150</div>
                    <div class="ratings" style="color: yellow;">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
                <div class="course-info">
                    <h3>How to make breakfast at home</h3>
                    <i class="fa-solid fa-users"></i> 69 <span>Student enrobed</span>
                </div>
            </div>
        </div>

    </section>

</body>

</html>