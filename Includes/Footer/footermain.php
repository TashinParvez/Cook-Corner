<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <style>
        footer {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .temp-mail-smart-button-wrapper {
            margin-bottom: 0;
        }

        .footer-img {
            margin-left: 200px !important;
            height: auto;
            width: 170px;
            object-fit: cover;
        }
    </style>

    <!-- Full width hr element -->

    <hr style="  border: 1px solid #000;
            width: 100%;
            margin: 0;">

    <!-- Full width footer container -->
    <div class="container-fluid mt-1">
        <footer class="ps-5 pe-5">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Recipe</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Quick And Easy</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Week Night</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Vegan</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Vegetarian</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Beverage</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Occasion</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Islamic</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Hinduism</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Christianity</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Common Occasion</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Ceremony</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Tips</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Time-Saving Hacks</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Baking Tips</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Healthy Cooking</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Ingredient Storage</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Food Safety</a></li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">

                    <img class="footer-img" src="../../Images/logo/fav-icon.png" alt="logo">

                    <form>
                        <h5 class="text-center">Subscribe to our newsletter</h5>
                        <p class="text-center">Monthly digest of what's new and exciting from us</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2 temp-mail-smart-button-wrapper">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between  border-top">
                <p>© 2024 Team Pentagon. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#twitter"></use>
                            </svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#instagram"></use>
                            </svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#facebook"></use>
                            </svg></a></li>
                </ul>
            </div>
        </footer>
    </div>

</body>

</html>