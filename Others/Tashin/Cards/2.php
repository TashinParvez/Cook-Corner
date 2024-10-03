<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <style> /* General card styling */
.recipe-card {
    width: 300px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
}

/* Image container */
.recipe-img {
    position: relative;
    width: 100%;
    height: 200px;
    overflow: hidden;
}

/* Image styling */
.recipe-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

/* Save icon styling */
.save-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    color: #fff;
    font-size: 20px;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 10px;
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Recipe information */
.recipe-info {
    padding: 15px;
}

/* Title styling */
.recipe-title {
    margin: 0;
    font-size: 1.25rem;
    font-weight: bold;
    color: #333;
}

/* Added by styling */
.added-by {
    font-size: 0.9rem;
    color: #777;
}

/* Ratings styling */
.ratings {
    margin-top: 5px;
    color: #f4c150;
    font-size: 1rem;
}

/* Hover details - Initially hidden */
.hover-details {
    position: absolute;
    top: 0; /* Adjusted to 0 to overlay on the image */
    left: 0;
    width: 100%;
    height: 100%; /* Match the height of the image */
    background-color: rgba(0, 0, 0, 0.8);
    color: #fff;
    padding: 15px;
    box-sizing: border-box;
    text-align: left;
    font-size: 0.9rem;
    opacity: 0; /* Start hidden */
    transition: opacity 0.3s ease; /* Smooth transition */
}

/* Hover effect */
.recipe-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

/* Image zoom effect on hover */
.recipe-card:hover .recipe-img img {
    transform: scale(1.1);
}

/* Show hover details on hover */
.recipe-card:hover .hover-details {
    opacity: 1; /* Show the details */
}

/* Save icon hover effect */
.save-icon:hover {
    background-color: rgba(0, 0, 0, 0.8);
}
</style>

</head>

<body>

   <div class="recipe-card">
    <div class="recipe-img">
        <img src="/Images/Kitchen-Tips/batch_cooking.jpg" alt="Recipe Image">
        <i class="fas fa-bookmark save-icon"></i>
    </div>
    <div class="recipe-info">
        <h3 class="recipe-title">Delicious Pasta</h3>
        <p class="added-by">Added by: <strong>Chef Mario</strong></p>
        <div class="ratings">
            <span>★★★★☆</span>
            <small>(4.5)</small>
        </div>
    </div>
    <div class="hover-details">
        <p><strong>Prep Time:</strong> 20 mins</p>
        <p><strong>Cook Time:</strong> 30 mins</p>
        <p><strong>Ingredients:</strong> 7</p>
    </div>
</div>

     

</body>

</html>