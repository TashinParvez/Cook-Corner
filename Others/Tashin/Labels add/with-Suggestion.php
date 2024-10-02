<?php
// Database connection
include('/Cook-Corner/Includes/Database Connection/database_connection.php');

// Query to fetch cities
$sql = "SELECT city_name FROM `cities` WHERE 1;";
$result = mysqli_query($conn, $sql);

// Get the city names and store them in a one-dimensional array  []

$cities = [];   // this will use as suggestion next

while ($row = mysqli_fetch_assoc($result)) {
    $cities[] = $row['city_name'];
}

mysqli_free_result($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cities Input with Suggestions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tag {
            display: flex;
            align-items: center;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 5px 10px;
            margin: 2px;
        }

        .tag span {
            margin-right: 5px;
        }

        .tag .remove-btn {
            cursor: pointer;
            background: none;
            border: none;
            color: red;
            font-size: 16px;
        }

        .tag-container {
            display: flex;
            flex-wrap: wrap;
        }

        #suggestions {
            border: 1px solid #ddd;
            max-height: 150px;
            overflow-y: auto;
            position: absolute;
            width: 100%;
            z-index: 1000;
            background-color: white;
        }

        .list-group-item {
            padding: 10px;
            cursor: pointer;
        }

        .list-group-item:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="form-group position-relative">
            <label for="cities-input">Cities Information</label>
            <div class="tag-input position-relative">
                <input type="text" id="cities-input" class="form-control" placeholder="Add Cities" />
                <div id="tag-container" class="tag-container mt-2"></div>
            </div>
            <!-- Suggestions will appear here -->
            <div id="suggestions" class="list-group mt-1"></div>
        </div>
    </div>

    <script>
        // PHP cities array passed to JavaScript
        const suggestions = <?php echo json_encode($cities); ?>;

        const input = document.getElementById('cities-input');
        const tagContainer = document.getElementById('tag-container');
        const suggestionBox = document.getElementById('suggestions');

        input.addEventListener('input', function() {
            const value = input.value.toLowerCase();
            suggestionBox.innerHTML = ''; // Clear previous suggestions

            if (value) {
                const filteredSuggestions = suggestions.filter(s => s.toLowerCase().includes(value));

                filteredSuggestions.forEach(city => {
                    const highlightedCity = highlightMatch(city, value);
                    const suggestionItem = document.createElement('div');
                    suggestionItem.innerHTML = highlightedCity;
                    suggestionItem.classList.add('list-group-item', 'list-group-item-action');

                    // Add click functionality to add the city as a tag
                    suggestionItem.addEventListener('click', function() {
                        addTag(city);
                        input.value = '';
                        suggestionBox.innerHTML = ''; // Clear suggestions after click
                    });

                    suggestionBox.appendChild(suggestionItem);
                });
            }
        });

        input.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                const value = input.value.trim();
                if (value && !Array.from(tagContainer.children).some(tag => tag.textContent.includes(value))) {
                    addTag(value);
                    input.value = '';
                    suggestionBox.innerHTML = ''; // Clear suggestions
                }
            }
        });

        // Add the tag to the tag container
        function addTag(value) {
            const tag = document.createElement('div');
            tag.className = 'tag';
            tag.innerHTML = `<span>${value}</span><button class="remove-btn">&times;</button>`;
            tag.querySelector('.remove-btn').addEventListener('click', () => {
                tagContainer.removeChild(tag);
            });
            tagContainer.appendChild(tag);
        }

        // Highlight matching part of the city name
        function highlightMatch(city, query) {
            const regex = new RegExp(`(${query})`, 'gi');
            return city.replace(regex, '<span style="color: red;">$1</span>');
        }
    </script>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>