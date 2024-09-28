<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchen Tips</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link rel="stylesheet" href="kitchenTipsDashboard.css">
    <link rel="stylesheet" href="oneCategoryOfKittchTips.css">

</head>

<body>
    <?php
    include('../Includes/Navbar/navbarMain.php');  // tashin 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>

    <!-- ---------------------------- first Segement ---------------------------------------- -->
    <div class="text-center mt-4">
        <!-- Title and Subtitle -->
        <h1 class="fw-bold">Kitchen Tips</h1>
        <p>Find cookware recommendations, money-saving ideas, holiday help, how-to tips, and more cooking and baking
            suggestions from our Allrecipes editors.</p>
    </div>


    <!-- ---------------------------- Main Image Section ---------------------------------------- -->

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <img src="https://via.placeholder.com/960x540" class="img-fluid" alt="Featured Image">
                <h2 class="mt-3">What to Do Now If Your Turkey’s Still Frozen on Thanksgiving</h2>
                <p>By Diana Christensen</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum officiis, alias debitis error ea sed unde. Quidem optio expedita
                    praesentium? Hic ad mollitia quia magni, deserunt a totam odit optio pariatur maxime illum deleniti rem debitis at blanditiis!
                    Blanditiis at laudantium, ullam exercitationem dignissimos nemo itaque perspiciatis, deserunt magni dicta et optio nisi nulla quos,
                    est omnis non quo saepe similique illum culpa assumenda voluptatum sunt? Omnis facilis ab dolorem. Ea fugiat reiciendis aut veritatis
                    numquam amet placeat, architecto labore temporibus quaerat natus error libero, neque officia, fuga dolor? Id, quaerat. Cum eveniet veritatis
                    esse quaerat saepe pariatur numquam deleniti modi culpa, adipisci consectetur nisi consequatur dicta dolores error? Recusandae reprehenderit
                    expedita nam aut fugit iusto tenetur sit esse cum veritatis, repellendus odio voluptatum modi enim dolorum tempore in. Qui sed optio suscipit
                    labore distinctio fugiat neque inventore at corporis
                    sit autem eaque quod, provident, iusto maxime totam? Harum accusantium dolore ipsum rem culpa vel. Atque, corporis repellat. </p>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <img src="https://via.placeholder.com/150" class="img-fluid" alt="Thumbnail">
                        <p>Article Title</p>
                    </div>
                    <div class="col-md-12 mb-3">
                        <img src="https://via.placeholder.com/150" class="img-fluid" alt="Thumbnail">
                        <p>Article Title</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-----------------------------------------------------------  Explore Kitchen Tips ----------------------------------------------------------->
    <div class="container mt-5">
        <div class="explore-section">
            <h1 class="explore-title">Explore Kitchen Tips</h1>
            <!-- Search Bar -->
            <div class="search-bar">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Find a recipe or ingredient">
                    <button class="btn btn-outline-secondary" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zm-5.442 1.102a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <hr>


        <div class="row">
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>How to Season a Cast Iron Skillet</h5>
                <p>Kitchen Tools and Techniques</p>
            </div>
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>How to Clean Dirty Sheet Pans</h5>
                <p>Cleaning</p>
            </div>
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>What's the Difference Between a Convection Oven and an Air Fryer?</h5>
                <p>Kitchen Tools and Techniques</p>
            </div>
            <!-- Add more care tips here -->
        </div>

        <div class="row">
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>How to Season a Cast Iron Skillet</h5>
                <p>Kitchen Tools and Techniques</p>
            </div>
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>How to Clean Dirty Sheet Pans</h5>
                <p>Cleaning</p>
            </div>
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>What's the Difference Between a Convection Oven and an Air Fryer?</h5>
                <p>Kitchen Tools and Techniques</p>
            </div>
            <!-- Add more care tips here -->
        </div>
        <div class="row">
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>How to Season a Cast Iron Skillet</h5>
                <p>Kitchen Tools and Techniques</p>
            </div>
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>How to Clean Dirty Sheet Pans</h5>
                <p>Cleaning</p>
            </div>
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>What's the Difference Between a Convection Oven and an Air Fryer?</h5>
                <p>Kitchen Tools and Techniques</p>
            </div>
            <!-- Add more care tips here -->
        </div>
        <div class="row">
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>How to Season a Cast Iron Skillet</h5>
                <p>Kitchen Tools and Techniques</p>
            </div>
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>How to Clean Dirty Sheet Pans</h5>
                <p>Cleaning</p>
            </div>
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>What's the Difference Between a Convection Oven and an Air Fryer?</h5>
                <p>Kitchen Tools and Techniques</p>
            </div>
            <!-- Add more care tips here -->
        </div>
        <div class="row">
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>How to Season a Cast Iron Skillet</h5>
                <p>Kitchen Tools and Techniques</p>
            </div>
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>How to Clean Dirty Sheet Pans</h5>
                <p>Cleaning</p>
            </div>
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>What's the Difference Between a Convection Oven and an Air Fryer?</h5>
                <p>Kitchen Tools and Techniques</p>
            </div>
            <!-- Add more care tips here -->
        </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>