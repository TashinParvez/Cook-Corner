<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


   <style>
    /* General Styles for the Card */
.recipe-card {
    position: relative;
    width: 300px;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    border: 1px solid #ddd;
    background-color: #f8f8f8;
}

/* Card Image Wrapper */
.card-img-wrapper {
    position: relative;
    width: 100%;
    height: 200px;
    overflow: hidden;
}

/* Recipe Image */
.card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

/* Save Icon on the Image */
.save-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    color: #fff;
    background-color: rgba(0, 0, 0, 0.6);
    padding: 8px;
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.3s;
}

.save-icon:hover {
    background-color: rgba(0, 0, 0, 0.9);
}

/* Card Content */
.card-content {
    padding: 15px;
    text-align: left;
}

.card-title {
    font-size: 20px;
    margin: 0;
    color: #333;
}

.card-author {
    font-size: 14px;
    color: #666;
    margin: 5px 0;
}

.card-ratings span {
    font-size: 18px;
    color: #ffcc00;
}

/* Hover Effects */
.recipe-card:hover {
    transform: translateY(-10px);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
}

.card-img-wrapper:hover .card-img {
    transform: scale(1.1);
}

/* Hover Info Display */
.hover-info {
    display: none;
    position: absolute;
    bottom: 0;
    background-color: rgba(255, 255, 255, 0.9);
    width: 100%;
    padding: 10px;
    text-align: left;
    font-size: 14px;
}

.recipe-card:hover .hover-info {
    display: block;
}

   </style>

</head>


<body>
    <div class="container">

        <div class="recipe-card">
            <div class="card-img-wrapper">
                <img src="/Images/Kitchen-Tips/batch_cooking.jpg" alt="Recipe Image" class="card-img">
                <i class="save-icon bi bi-bookmark"></i> <!-- Save icon on image -->
            </div>
            <div class="card-content">
                <h3 class="card-title">Recipe Title</h3>
                <p class="card-author">Added by: User Name</p>
                <div class="card-ratings">
                    <span>⭐⭐⭐⭐☆</span> <!-- Star Ratings -->
                </div>
            </div>

            <!-- Hover content -->
            <div class="hover-info">
                <p><strong>Prep Time:</strong> 15 mins</p>
                <p><strong>Cook Time:</strong> 30 mins</p>
                <p><strong>Ingredients:</strong> 10</p>
            </div>
        </div>
    </div>



</body>

</html>