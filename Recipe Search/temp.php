<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    .custom-button {
      background-color: white;
      color: #6c757d; /* Text and icon color */
      border-radius: 10px; /* Ensures all corners are rounded */
      padding: 0.5rem 1rem; /* Adjust padding as needed */
      border: 1px solid #6c757d; /* Border color to match text color */
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .custom-button:hover {
      background-color: #f8f9fa; /* Light grey on hover */
      color: #343a40; /* Darker color for text and icon on hover */
    }

    .custom-button i {
      margin-left: 0.5rem; /* Space between text and icon */
      color: inherit; /* Ensures icon color matches the text color */
    }
  </style>
  <title>Custom Button Example</title>
</head>
<body>
  <form class="container bg-light w-100 mb-3" action="" method="post">
    <div class="btn-group w-100">
      <button class="btn btn-secondary btn-sm custom-button" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        <span>Small button</span>
        <i class="fas fa-plus" style="background-color: #343a40;"></i>
      </button>
      <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
        <li><a class="dropdown-item" href="#">Menu item</a></li>
      </ul>
    </div>
  </form>
</body>
</html>
