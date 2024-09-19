<?php

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- Include Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> -->
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
</head>

<body style="background-color: #f0faf0;">
	<?php
	//  include('../Includes/Navbar/navbarMain.php');
	?>
	<section class="best-recipe m-4">
		<div class="container ">
			<div class="row g-0 text-center">
				<div class="col-12">
					<h2 class="m-0 p-0">Occasions</h2>
					<p class="m-0 p-0">Plan your special moments with ease and discover personalized recipes, menus and ideas for every
						celebration, from birthdays to anniversaries, all in one place.</p>
				</div>
			</div>
		</div>
	</section>

	<div class="container ">
		<div class="row g-0 text-center">
			<div class="col-3 ">
				<!-- <h2>Filters</h2> -->
				<form class=" container  w-100 mb-3" action="" method="post">
				<div class="accordion" id="accordionOccasions">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            Eid al-Fitr
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordionOccasions">
                        <div class="accordion-body">
                            <ul class="list-unstyled">
                                <li><a href="#">Shemai</a></li>
                                <li><a href="#">Biryani</a></li>
                                <li><a href="#">Sheer Khurma</a></li>
                                <li><a href="#">Pudding</a></li>
                                <li><a href="#">Halwa</a></li>
                                <li><a href="#">Kheer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            Eid al-Adha
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionOccasions">
                        <div class="accordion-body">
                            <ul class="list-unstyled">
                                <li><a href="#">Biryani</a></li>
                                <li><a href="#">Shemai</a></li>
                                <li><a href="#">Pudding</a></li>
                                <li><a href="#">Sheer Khurma</a></li>
                                <li><a href="#">Halwa</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Additional Events -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Father's Day
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionOccasions">
                        <div class="accordion-body">
                            <ul class="list-unstyled">
                                <li><a href="#">Dish 1</a></li>
                                <li><a href="#">Dish 2</a></li>
                                <li><a href="#">Dish 3</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Add more event accordions as needed -->
            </div>
				</form>
			</div>

			<div class=" col-8 ">
				<div class="row row-cols-1 row-cols-md-3 g-4">

				  <div class="identity m-2">
                     <h2 class="m-0 p-2">Eid al-Fitr</h2>
                  </div>
					<!-- .... -->
				</div>

				<div class=" row row-cols-1 row-cols-md-3 g-4">

                
<!-- Content Section -->
<div class="col-md-9">
            <!-- Horizontal Scrollable Tabs -->
            <ul class="nav nav-tabs" id="recipeTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab-eid-fitr" data-bs-toggle="tab" href="#content-eid-fitr" role="tab" aria-controls="content-eid-fitr" aria-selected="true">Shemai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-eid-fitr-biryani" data-bs-toggle="tab" href="#content-eid-fitr-biryani" role="tab" aria-controls="content-eid-fitr-biryani" aria-selected="false">Biryani</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-eid-fitr-sheer-khurma" data-bs-toggle="tab" href="#content-eid-fitr-sheer-khurma" role="tab" aria-controls="content-eid-fitr-sheer-khurma" aria-selected="false">Sheer Khurma</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-eid-fitr-pudding" data-bs-toggle="tab" href="#content-eid-fitr-pudding" role="tab" aria-controls="content-eid-fitr-pudding" aria-selected="false">Pudding</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-eid-fitr-halwa" data-bs-toggle="tab" href="#content-eid-fitr-halwa" role="tab" aria-controls="content-eid-fitr-halwa" aria-selected="false">Halwa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-eid-fitr-kheer" data-bs-toggle="tab" href="#content-eid-fitr-kheer" role="tab" aria-controls="content-eid-fitr-kheer" aria-selected="false">Kheer</a>
                </li>
               

            </ul>

            <!-- Tab Content -->
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="content-eid-fitr" role="tabpanel">
                    <div class="row">
                        <!-- Recipe Card Example -->
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="your-image-path.jpg" class="card-img-top" alt="Shemai">
                                <div class="card-body">
                                    <h5 class="card-title">Shemai</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- More tab panes for other categories -->
                <div class="tab-pane fade" id="content-eid-fitr-biryani" role="tabpanel">
				<div class="col- ">
						<div class="card" style="width: 18rem;">
							<img src="../Images/background.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Biriyani</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>

                </div>

                <div class="tab-pane fade" id="content-eid-fitr-sheer-khurma" role="tabpanel">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="your-image-path.jpg" class="card-img-top" alt="Sheer Khurma">
                                <div class="card-body">
                                    <h5 class="card-title">Sheer Khurma</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add more tab content for each recipe category as needed -->
            </div>
        </div>
		                             
		                       <!-- old cards -->
					<div class="col- ">
						<div class="card" style="width: 18rem;">
							<img src="../Images/background.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>

					<div class="col- ">
						<div class="card" style="width: 18rem;">
							<img src="../Images/background.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>

					<div class="col- ">
						<div class="card" style="width: 18rem;">
							<img src="../Images/background.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>

					<div class="col- ">
						<div class="card" style="width: 18rem;">
							<img src="../Images/background.png" class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->

</html>