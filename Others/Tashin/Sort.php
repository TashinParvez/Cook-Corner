<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- css  -->
     
    <style> 
        .dropdown-toggle {
            min-width: 200px; 
            text-align: left;
        }
 
        .dropdown-item span {
            margin-right: 10px;
        }
 
        .dropdown-item span:empty {
            display: inline-block; 
            width: 15px; 
        }
    </style>
</head>


<body>



    <div class="col-4 d-flex justify-content-end">
        <div class="dropdown">
            <!-- Button with default text and fixed width -->
            <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Sorted by: Name
            </button>

            <!-- Dropdown items with checkmark logic -->
            <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                <li><a class="dropdown-item" href="#" onclick="changeSort('Name')"><span id="check-name">✔</span> Name</a></li>
                <li><a class="dropdown-item" href="#" onclick="changeSort('Recently Added')"><span id="check-recent"></span> Recently Added</a></li>
                <li><a class="dropdown-item" href="#" onclick="changeSort('Popularity')"><span id="check-popularity"></span> Popularity</a></li>
            </ul>
        </div>
    </div>



    <script>
        // Keep track of the current sort option
        let currentSort = 'Name';

        function changeSort(sortBy) {
            // Get the sort button element
            const sortButton = document.getElementById('sortDropdown');

            // Update the button text
            sortButton.textContent = 'Sorted by: ' + sortBy;

            // Reset all checkmarks
            document.getElementById('check-name').textContent = '';
            document.getElementById('check-recent').textContent = '';
            document.getElementById('check-popularity').textContent = '';

            // Add checkmark to the selected option
            if (sortBy === 'Name') {
                document.getElementById('check-name').textContent = '✔';
            } else if (sortBy === 'Recently Added') {
                document.getElementById('check-recent').textContent = '✔';
            } else if (sortBy === 'Popularity') {
                document.getElementById('check-popularity').textContent = '✔';
            }

            // Update the current sort option
            currentSort = sortBy;
        }
    </script>



</body>

</html>