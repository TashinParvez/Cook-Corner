<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMVq49X6LT1ql2e2nU0f3G7U6rYvZ6sDq2sor" crossorigin="anonymous">
    <!-- Other head elements like title, meta tags, etc. -->


    <style>
        /* Sidebar styling */
        #mySidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100%;
            background-color: #f5fcf0;
            transition: 0.3s;
            z-index: 1000;
        }

        /* Open Sidebar when active */
        #mySidebar.active {
            right: 0;
        }

        /* Toggle button for the right edge */
        #toggleSidebar {
            position: fixed;
            top: 50%;
            right: -40px;
            background-color: #ff5252;
            color: white;
            cursor: pointer;
            z-index: 1001;
            transition: right 0.3s;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;

            width: 30px !important;

        }

        /* Move toggle button along with sidebar */
        #mySidebar.active+#toggleSidebar {
            right: 400px;
        }



        #toggleSidebar {
            position: fixed;
            top: 50%;
            right: 0px;
            background-color: #ff5252;
            color: white;
            padding: 10px;
            cursor: pointer;
            z-index: 1001;
            transition: right 0.3s;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            width: 40px;
            height: 60px;
            text-align: center;
            line-height: 40px;
        }

        /* Move toggle button along with sidebar */
        #mySidebar.active+#toggleSidebar {
            right: 400px;
            /* Adjust position when sidebar is active */
        }

        .d-flex.text-center {
            justify-content: center;
            /* Center items horizontally */
            margin-top: 20px;
            /* Optional: add some margin for spacing */
        }

        tbody tr td .btn-primary {
            background: transparent !important;
            color: black;
            border: none;
        }

        tbody tr td .btn-primary:hover {
            background: transparent !important;
            color: black;
        }

        /* Centering text in table headers and cells */
        #mySidebar .table th,
        #mySidebar .table td {
            text-align: center;
            /* Center-align the text */
        }

        /* Optional: To ensure all tables use this style */
        table {
            width: 100%;
            /* Ensures the table takes full width */
        }

        tbody tr .btn-primary {
            outline: none;
            border: none;

        }

        h4 {
            text-align: center;
        }

        .nav-tabs .nav-link {
            color: black;
        }

        .nav-tabs .nav-link.active {
            background-color: #72BF78 !important;
            /* Change background color */
            color: white !important;
            /* Change text color */
        }

        .tab-pane .container ul li {
            list-style: none;
            margin-bottom: 5px;
        }

        .tab-pane .container ul li a {
            width: 90% !important;
            line-height: 40px !important;
            text-align: center !important;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: background-color 0.3s, border-color 0.3s;
        }

        /* Hover effect for links */
        .tab-pane .container ul li a:hover {
            background-color: #72BF78;
            border: 1px solid #72BF78;
            color: white !important;
        }


        .form-control {
            text-align: center;
        }

        #mySidebar .d-flex .btn {
            background-color: #72BF78;
            color: white;
            outline: none;
            border: none;
            width: 150px;
        }
    </style>
</head>

<!-- CSS -->


<!------------------------------ main Content ------------------------------>

<!-- Sidebar -->
<div id="mySidebar">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">



        <!-- Todo List  -->
        <li class="nav-item fs-6" role="presentation">
            <a class="nav-link" id="todo-tab" data-bs-toggle="tab" href="#todo" role="tab" aria-controls="todo" aria-selected="false">Todo List</a>
        </li>



        <!-- Cart -->
        <li class="nav-item fs-6" role="presentation">
            <a class="nav-link active" id="cart-tab" data-bs-toggle="tab" href="#cart" role="tab" aria-controls="cart" aria-selected="true">Cart</a>
        </li>



        <!-- Favourite -->
        <li class="nav-item fs-6" role="presentation">
            <a class="nav-link" id="favorites-tab" data-bs-toggle="tab" href="#favorites" role="tab" aria-controls="favorites" aria-selected="false">Favorites</a>
        </li>


    </ul>

    <!-- Tab content -->
    <div class="tab-content p-3">




        <!-- Todo List content-->
        <div class="tab-pane fade" id="todo" role="tabpanel" aria-labelledby="todo-tab">
            <h4>Todo List</h4>
            <table class="table table-striped">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">Item</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody id="todoTableBody"> <!-- Added ID for tbody -->

                </tbody>
            </table>

            <div class="d-flex text-center">
                <button type="button" class="btn btn-secondary btn-sm add" onclick="addTodoItem()">Add</button>
            </div>
        </div>


        <!-- Cart content-->
        <div class="tab-pane fade show active" id="cart" role="tabpanel" aria-labelledby="cart-tab">
            <h4>Cart Items</h4>

            <table class="table table-striped">

                <thead>
                    <tr class="table-dark">

                        <th scope="col">Item</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Parice</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <!-- items:  -->

                        <td>Tomatoes</td>


                        <td>
                            <button type="button" class="btn btn-primary btn-sm" onclick="changeQuantity(this, -1)">-</button>
                            <span class="quantity">1</span> <!-- Using span for quantity -->
                            <button type="button" class="btn btn-primary btn-sm" onclick="changeQuantity(this, 1)">+</button>
                        </td>

                        <td>20Tk</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>

                    <tr>
                        <!-- items:  -->

                        <td>Broccoli</td>

                        <td>
                            <button type="button" class="btn btn-primary btn-sm" onclick="changeQuantity(this, -1)">-</button>
                            <span class="quantity">1</span> <!-- Using span for quantity -->
                            <button type="button" class="btn btn-primary btn-sm" onclick="changeQuantity(this, 1)">+</button>
                        </td>

                        <td>20Tk</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>

                </tbody>

            </table>

            <div class="d-flex text-center ">
                <a type="button" class="btn btn-secondary btn-sm" href="../All Categories/allCategories.php">See All</a>
            </div>


        </div>

        <!-- Favorite content-->
        <div class="tab-pane fade" id="favorites" role="tabpanel" aria-labelledby="favorites-tab">
            <h4>Your Favorites</h4>
            <div class="container">
                <ul>
                    <li><a class="dropdown-item" href="#">Breakfast </a></li>
                    <li><a class="dropdown-item" href="#">Brunch</a></li>
                    <li><a class="dropdown-item" href="#">Lunch</a></li>
                    <li><a class="dropdown-item" href="#">Dinner</a></li>
                    <li><a class="dropdown-item" href="#">Snacks</a></li>
                    <li><a class="dropdown-item" href="#">Desserts</a></li>
                </ul>
            </div>
            <div class="d-flex text-center ">
                <a type="button" class="btn btn-secondary btn-sm" href="../All Categories/allCategories.php">See All</a>
            </div>
        </div>


    </div>
</div>

<!-- Sidebar Toggle Button -->
<div id="toggleSidebar">
    <<
        </div>


        <!-------------------------------------- JS -------------------------------------->
        <script>
            // Toggle Sidebar with Navbar Buttons
            document.getElementById('cartBtn').addEventListener('click', function() {
                document.getElementById('mySidebar').classList.add('active');
                var cartTab = new bootstrap.Tab(document.getElementById('cart-tab'));
                cartTab.show();
                updateToggleBtnText();
            });

            document.getElementById('favBtn').addEventListener('click', function() {
                document.getElementById('mySidebar').classList.add('active');
                var favoritesTab = new bootstrap.Tab(document.getElementById('favorites-tab'));
                favoritesTab.show();
                updateToggleBtnText();
            });

            document.getElementById('todoBtn').addEventListener('click', function() {
                document.getElementById('mySidebar').classList.add('active');
                var todoTab = new bootstrap.Tab(document.getElementById('todo-tab'));
                todoTab.show();
                updateToggleBtnText();
            });

            // Sidebar toggle button (<< / >>)
            document.getElementById('toggleSidebar').addEventListener('click', function() {
                document.getElementById('mySidebar').classList.toggle('active');
                updateToggleBtnText();
            });

            // Close sidebar when clicking outside
            document.querySelector('.content').addEventListener('click', function() {
                if (document.getElementById('mySidebar').classList.contains('active')) {
                    document.getElementById('mySidebar').classList.remove('active');
                    updateToggleBtnText();
                }
            });

            // Function to update toggle button text
            function updateToggleBtnText() {
                const sidebar = document.getElementById('mySidebar');
                const toggleBtn = document.getElementById('toggleSidebar');
                if (sidebar.classList.contains('active')) {
                    toggleBtn.innerHTML = '>>'; // Sidebar is open
                } else {
                    toggleBtn.innerHTML = '<<'; // Sidebar is closed
                }
            }



            function addTodoItem() {
                // Create a new table row
                const newRow = document.createElement('tr');

                // Construct the HTML for the new row
                newRow.innerHTML = `
            <td><input type="text" class="form-control" placeholder="Item Name"></td>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <td>
            <button type="button" class="btn btn-primary btn-sm" onclick="changeQuantity(this, -1)">-</button>
            <span class="quantity">1</span> <!-- Using span for quantity -->
            <button type="button" class="btn btn-primary btn-sm" onclick="changeQuantity(this, 1)">+</button>
            </td>
        `;

                // Append the new row to the table body
                document.getElementById('todoTableBody').appendChild(newRow);
            }

            // Function to change the quantity
            function changeQuantity(button, delta) {
                const quantitySpan = button.parentNode.querySelector('.quantity');
                let currentQuantity = parseInt(quantitySpan.textContent); // Get the current quantity

                // Update the quantity based on delta
                if (currentQuantity + delta > 0) { // Prevent quantity from going below 1
                    quantitySpan.textContent = currentQuantity + delta;
                }
            }
        </script>