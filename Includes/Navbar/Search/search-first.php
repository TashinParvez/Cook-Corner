<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Dropdown and Search Input</title>
    <style>
        .small-input {
            width: 50px !important;
        }
        .sidebar-input {
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }
        .sidebar-input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="input-group mb-3">
        <!-- Dropdown Button -->
        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#" onclick="submitSortForm('action')">Action</a></li>
                <li><a class="dropdown-item" href="#" onclick="submitSortForm('another')">Another action</a></li>
                <li><a class="dropdown-item" href="#" onclick="submitSortForm('somethingElse')">Something else here</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#" onclick="submitSortForm('separated')">Separated link</a></li>
            </ul>
        </div>

        <!-- Search input -->
        <input class="form-control sidebar-input" type="text" placeholder="Search..." aria-label="Search" id="searchInput">

        <!-- Search button with icon -->
        <button class="btn btn-outline-secondary" type="button" onclick="submitSearch()">
            <i class="fas fa-magnifying-glass"></i>
        </button>
    </div>
</div>

<script>
    function submitSortForm(sortInput) {
        console.log("Selected sort option:", sortInput);
        // Implement your sorting logic here, e.g., form submission or AJAX request.
        // Example: submit to a form
        // document.getElementById("sortForm").submit();
    }

    function submitSearch() {
        const searchValue = document.getElementById('searchInput').value;
        console.log("Search query:", searchValue);
        // Implement your search logic here, e.g., form submission or AJAX request.
        // Example: submit to a form
        // document.getElementById("searchForm").submit();
    }
</script>

<!-- Include Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
