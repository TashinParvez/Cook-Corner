<?php

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- css  -->
    <!-- <link href="css/styles.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css">      <!-- Navbar CSS -->

</head>


<body>



    <!-- Modal Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>


    <!-- Modal open -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="card mb-3" >
                        <div class="row g-0">

                            <!-- ------------ Segment 1 ---------------- -->
                            <div class="col-4">
                                <h3 class="card-title">Added to Saved Recipes</h3>
                                <img src="/Images/food-image-gallery_homepage_V2_CA.png" class="img-fluid rounded-start" alt="...">
                                <h5 class="card-title">Burger</h5>
                            </div>
                            <!-- ------------- Segment 2 --------------- -->

                            <div class="col-8">
                                <div class="card-body">
                                    <h5 class="card-title">Add to collections</h5>
                                    <hr>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            collection 1 (Public)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                        <label class="form-check-label" for="defaultCheck2">
                                            collection 2 (private)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                        <label class="form-check-label" for="defaultCheck3">
                                            collection 2 (private)
                                        </label>
                                    </div>
                                    <hr>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Create New collection</button>

                                </div>

                                <!-- ------------ Footer ---------------- -->
                                <hr>
                                <div>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Remove</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</body>

</html>