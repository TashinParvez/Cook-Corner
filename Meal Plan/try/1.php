<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Planner</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Add some basic styling */
        #calendar {
            width: 50%; /* Adjust width to your preference */
            height: 400px; /* Set a specific height */
            margin: 20px auto;
        }

        #meal-segments {
            display: flex;
            justify-content: space-between;
            margin: 20px auto;
            width: 80%;
        }

        .meal-segment {
            width: 23%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .meal-segment h3 {
            margin: 0;
            padding-bottom: 10px;
        }

        #copy-controls {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Calendar Section -->
    <div id="calendar"></div>

    <!-- Meal Segments Section -->
    <div id="meal-segments">
        <div class="meal-segment" id="morning-segment">
            <h3>Morning</h3>
            <div id="morning-content"></div>
        </div>
        <div class="meal-segment" id="lunch-segment">
            <h3>Lunch</h3>
            <div id="lunch-content"></div>
        </div>
        <div class="meal-segment" id="snacks-segment">
            <h3>Snacks</h3>
            <div id="snacks-content"></div>
        </div>
        <div class="meal-segment" id="dinner-segment">
            <h3>Dinner</h3>
            <div id="dinner-content"></div>
        </div>
    </div>

    <!-- Copy Controls -->
    <div id="copy-controls">
        <input type="date" id="copy-from-date" placeholder="Copy from Date">
        <button onclick="copyMeals()">Copy Meals</button>
    </div>

    <script>
        var selectedDate = new Date().toISOString().split('T')[0]; // Default to today's date

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                dateClick: function(info) {
                    selectedDate = info.dateStr; // Set the selected date
                    loadMealsForDate(selectedDate);
                }
            });
            calendar.render();

            // Load today's meals on page load
            loadMealsForDate(selectedDate);
        });

        function loadMealsForDate(date) {
            $.ajax({
                url: 'fetch_meals.php',
                method: 'GET',
                data: {
                    date: date
                },
                success: function(response) {
                    let meals = JSON.parse(response);
                    $('#morning-content').html(meals.morning);
                    $('#lunch-content').html(meals.lunch);
                    $('#snacks-content').html(meals.snacks);
                    $('#dinner-content').html(meals.dinner);
                }
            });
        }

        function copyMeals() {
            let copyFromDate = $('#copy-from-date').val();
            if (copyFromDate) {
                $.ajax({
                    url: 'copy_meals.php',
                    method: 'POST',
                    data: {
                        from_date: copyFromDate,
                        to_date: selectedDate
                    },
                    success: function(response) {
                        alert(response);
                        loadMealsForDate(selectedDate); // Reload meals after copying
                    }
                });
            } else {
                alert('Please select a date to copy from.');
            }
        }
    </script>

</body>

</html>