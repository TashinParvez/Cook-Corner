<?php
session_start();
$user_id = $_SESSION['user_id'] ?? '5'; // Default user ID if not set
$search_query = $_GET['query'] ?? ''; // Get the search query

// include("../Includes/Database Connection/database_connection.php");
// include("./Includes/Database-connection-new/database_connection.php");
include("/Cook-Corner/Includes/Database-connection-new/database_connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare('SELECT first_name FROM user_info WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($name);
$stmt->fetch();
$stmt->close();
$conn->close(); // Close the connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="navbarMain.css">
    <style>
        .suggestion-item {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
        }
        .suggestion-item:hover {
            background-color: #f0f0f0;
        }
        #suggestions {
            position: absolute; /* Ensure suggestions dropdown appears correctly */
            z-index: 1000; /* Ensure it's above other content */
            background-color: white; /* Make suggestions background white */
            width: 100%; /* Make suggestions align with input width */
            border: 1px solid #ddd; /* Add a border to suggestions */
            display: none; /* Initially hidden */
        }
    </style>
</head>

<body>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="../../Images/logo/cook_Corner_LOGO-removebg.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex" role="search" action="/Search/globalsearch.php" method="GET">
                        <input
                            class="form-control me-2"
                            type="text"
                            name="query"
                            placeholder="Search......"
                            aria-label="Search"
                            id="searchInput"
                            value="<?= htmlspecialchars($search_query); ?>"
                            required
                            autocomplete="off">
                        <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <div id="suggestions" class="suggestions"></div>
                </div>
            </div>
        </nav>
    </header>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const suggestionsDiv = document.getElementById("suggestions");

            function displaySuggestions(data) {
                suggestionsDiv.innerHTML = '';
                if (data.length > 0) {
                    suggestionsDiv.style.display = 'block'; // Show suggestions
                    data.forEach(item => {
                        const suggestion = document.createElement("div");
                        suggestion.textContent = item;
                        suggestion.classList.add("suggestion-item");
                        suggestion.addEventListener("click", function() {
                            searchInput.value = item; // Fill input with suggestion
                            suggestionsDiv.innerHTML = ''; // Clear suggestions
                            suggestionsDiv.style.display = 'none'; // Hide suggestions
                        });
                        suggestionsDiv.appendChild(suggestion);
                    });
                } else {
                    suggestionsDiv.style.display = 'none'; // Hide if no suggestions
                }
            }

            searchInput.addEventListener("input", function() {
                const query = this.value.trim();
                if (query.length > 0) {
                    fetch(`suggestions.php?query=${encodeURIComponent(query)}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Suggestions received:', data); // Debugging line
                            displaySuggestions(data);
                        })
                        .catch(error => console.error('Error fetching suggestions:', error));
                } else {
                    suggestionsDiv.innerHTML = ''; // Clear suggestions when input is empty
                }
            });

            searchInput.addEventListener("focus", function() {
                if (this.value.length === 0) {
                    fetch(`suggestions.php`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('Top suggestions received:', data); // Debugging line
                            displaySuggestions(data);
                        })
                        .catch(error => console.error('Error fetching top suggestions:', error));
                }
            });
        });
    </script>
</body>
</html>
