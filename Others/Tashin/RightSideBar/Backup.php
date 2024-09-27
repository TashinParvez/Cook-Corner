<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sidebar styling */
        #mySidebar {
            position: fixed;
            top: 0;
            right: -250px;
            width: 250px;
            height: 100%;
            background-color: #f8f9fa;
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
            background-color: #007bff;
            color: white;
            padding: 10px;
            cursor: pointer;
            z-index: 1001;
            transition: right 0.3s;
        }

        /* Move toggle button along with sidebar */
        #mySidebar.active + #toggleSidebar {
            right: 250px;
        }

        /* Main content */
        .content {
            margin-right: 20px;
            transition: margin-right 0.3s;
        }

        /* Adjust content when sidebar is open */
        #mySidebar.active ~ .content {
            margin-right: 250px;
        }
    </style>
</head>

<body>
    <!-- Navbar with buttons -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <button class="btn btn-primary" id="cartBtn">Cart</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-primary" id="favBtn">Favorites</button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-primary" id="todoBtn">Todo List</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div id="mySidebar">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="cart-tab" data-bs-toggle="tab" href="#cart" role="tab" aria-controls="cart" aria-selected="true">Cart</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="favorites-tab" data-bs-toggle="tab" href="#favorites" role="tab" aria-controls="favorites" aria-selected="false">Favorites</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="todo-tab" data-bs-toggle="tab" href="#todo" role="tab" aria-controls="todo" aria-selected="false">Todo List</a>
            </li>
        </ul>

        <!-- Tab content -->
        <div class="tab-content p-3">
            <div class="tab-pane fade show active" id="cart" role="tabpanel" aria-labelledby="cart-tab">
                <h4>Cart Items</h4>
                <p>Your cart is empty.</p>
            </div>
            <div class="tab-pane fade" id="favorites" role="tabpanel" aria-labelledby="favorites-tab">
                <h4>Your Favorites</h4>
                <p>No favorite items yet.</p>
            </div>
            <div class="tab-pane fade" id="todo" role="tabpanel" aria-labelledby="todo-tab">
                <h4>Todo List</h4>
                <p>You have no tasks.</p>
            </div>
        </div>
    </div>

    <!-- Sidebar Toggle Button -->
    <div id="toggleSidebar"><<</div>

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <h1>Main Content</h1>
            <p>Click anywhere on this content to close the sidebar if it's open.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Sidebar with Navbar Buttons
        document.getElementById('cartBtn').addEventListener('click', function () {
            document.getElementById('mySidebar').classList.add('active');
            var cartTab = new bootstrap.Tab(document.getElementById('cart-tab'));
            cartTab.show();
            updateToggleBtnText();
        });

        document.getElementById('favBtn').addEventListener('click', function () {
            document.getElementById('mySidebar').classList.add('active');
            var favoritesTab = new bootstrap.Tab(document.getElementById('favorites-tab'));
            favoritesTab.show();
            updateToggleBtnText();
        });

        document.getElementById('todoBtn').addEventListener('click', function () {
            document.getElementById('mySidebar').classList.add('active');
            var todoTab = new bootstrap.Tab(document.getElementById('todo-tab'));
            todoTab.show();
            updateToggleBtnText();
        });

        // Sidebar toggle button (<< / >>)
        document.getElementById('toggleSidebar').addEventListener('click', function () {
            document.getElementById('mySidebar').classList.toggle('active');
            updateToggleBtnText();
        });

        // Close sidebar when clicking outside
        document.querySelector('.content').addEventListener('click', function () {
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
                toggleBtn.innerHTML = '>>';  // Sidebar is open
            } else {
                toggleBtn.innerHTML = '<<';  // Sidebar is closed
            }
        }
    </script>
</body>

</html>
