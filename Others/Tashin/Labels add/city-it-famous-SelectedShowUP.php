<?php 
include('/Cook-Corner/Includes/Database Connection/database_connection.php');
 
$sql = "SELECT city_name FROM `cities` WHERE 1";
$result = mysqli_query($conn, $sql);

$allCities = [];

while ($row = mysqli_fetch_assoc($result)) {
    $allCities[] = $row['city_name'];
}

mysqli_free_result($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Input with Suggestions</title>
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
            margin-bottom: 10px;
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
            <label for="city-input">City Information</label>

            <!-- Moved the tag-container ABOVE the input field -->
            <div id="city-tag-container" class="tag-container mt-2"></div>

            <div class="tag-input position-relative">
                <input type="text" id="city-input" class="form-control" placeholder="Add Cities" />
            </div>

            <!-- Suggestions will appear here -->
            <div id="city-suggestions" class="list-group mt-1"></div>
        </div>
    </div>

    <script>
        // PHP cities array passed to JavaScript
        const citySuggestions = <?php echo json_encode($allCities); ?>;

        // Encapsulate city suggestion functionality
        const citySuggestionModule = (() => {
            const cityInput = document.getElementById('city-input');
            const cityTagContainer = document.getElementById('city-tag-container');
            const citySuggestionBox = document.getElementById('city-suggestions');

            // Initialize event listeners
            const init = () => {
                cityInput.addEventListener('input', filterSuggestions);
                cityInput.addEventListener('keydown', addCityOnEnter);
            };

            const filterSuggestions = () => {
                const value = cityInput.value.toLowerCase();
                citySuggestionBox.innerHTML = ''; // Clear previous suggestions

                if (value) {
                    const filteredSuggestions = citySuggestions.filter(city => city.toLowerCase().includes(value));

                    filteredSuggestions.forEach(city => {
                        const highlightedCity = highlightMatch(city, value);
                        const suggestionItem = document.createElement('div');
                        suggestionItem.innerHTML = highlightedCity;
                        suggestionItem.classList.add('list-group-item', 'list-group-item-action');

                        // Add click functionality to add the city as a tag element
                        suggestionItem.addEventListener('click', () => {
                            addCityTag(city);
                            cityInput.value = ''; // Clear input after selection
                            citySuggestionBox.innerHTML = ''; // Clear suggestions after click
                        });

                        citySuggestionBox.appendChild(suggestionItem);
                    });
                }
            };

            const addCityOnEnter = (event) => {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    const value = cityInput.value.trim();
                    if (value && !Array.from(cityTagContainer.children).some(tag => tag.textContent.includes(value))) {
                        addCityTag(value);
                        cityInput.value = ''; // Clear input after adding tag
                        citySuggestionBox.innerHTML = ''; // Clear suggestions
                    }
                }
            };

            // Add the city to the tag container
            const addCityTag = (value) => {
                const tag = document.createElement('div');
                tag.className = 'tag';
                tag.innerHTML = `<span>${value}</span><button class="remove-btn">&times;</button>`;
                tag.querySelector('.remove-btn').addEventListener('click', () => {
                    cityTagContainer.removeChild(tag);
                });
                cityTagContainer.appendChild(tag);
            };

            // Highlight matching part of the city name
            const highlightMatch = (city, query) => {
                const regex = new RegExp(`(${query})`, 'gi');
                return city.replace(regex, '<span style="color: red;">$1</span>');
            };

            // Initialize the module
            return {
                init: init
            };
        })();

        // Initialize the city suggestion module
        citySuggestionModule.init();
    </script>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>

</html>
