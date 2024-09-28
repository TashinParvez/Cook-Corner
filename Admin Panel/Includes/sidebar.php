<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 100vh; position: fixed;">

    <a href="/Admin Panel/Admin Dashboard/dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <img src="/Images/logo/cook_Corner_LOGO-removebg-mainPartOnly.png" alt="Logo" width="40" height="32" class="me-2"> <!-- Replace with your logo path -->
        <span class="fs-4">Admin Panel</span> <!-- Changed "Sidebar" to "Admin Panel" -->
    </a>
    <hr>





    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/Admin Panel/Admin Dashboard/dashboard.php" class="nav-link active" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#home"></use>
                </svg>
                Dashboard
            </a>
        </li>

        <li>
            <a href="/Admin Panel/Notifications/notification.php" class="nav-link link-dark">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#grid"></use>
                </svg>
                Notifications
            </a>
        </li>
        <li>
            <a href="/Admin Panel/Management/UserManagement.php" class="nav-link link-dark">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#grid"></use>
                </svg>
                User Management
            </a>
        </li>

        <li>
            <a href="/Admin Panel/Management/CourseManagement.php" class="nav-link link-dark">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#grid"></use>
                </svg>
                Course Management
            </a>
        </li>
        <li>
            <a href="/Admin Panel/Management/RecipeManagement.php" class="nav-link link-dark">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#grid"></use>
                </svg>
                Recipe Management
            </a>
        </li>
        <li>
            <a href="/Admin Panel/Management/ChefApplicationManagement.php" class="nav-link link-dark">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#grid"></use>
                </svg>
                Chef Applications
            </a>
        </li>



        <li>
            <a href="/Admin Panel/Add New Course/addCourse.php" class="nav-link link-dark">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#table"></use>
                </svg>
                Add New Course
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-dark">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#grid"></use>
                </svg>
                Products
            </a>
        </li>

    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>