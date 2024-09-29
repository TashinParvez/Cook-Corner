<?php
// Database table name:

//...................... Database Connection ..............................
include("../../Includes/Database Connection/database_connection.php");

$userID = '1';  // instructor id

if (isset($_POST['submit'])) {

    // Get form data
    $courseTitle = mysqli_real_escape_string($conn, $_POST['courseTitle']); // 'courseTitle' refers to the name or id
    $courseAbstract = mysqli_real_escape_string($conn, $_POST['courseAbstract']);
    $courseDescription = mysqli_real_escape_string($conn, $_POST['courseDescription']);
    $courseAmount = mysqli_real_escape_string($conn, $_POST['courseAmount']);
    $playlistLink = mysqli_real_escape_string($conn, $_POST['playlistLink']);
    $courseDuration = mysqli_real_escape_string($conn, $_POST['courseDuration']);
    $difficultyLevel = mysqli_real_escape_string($conn, $_POST['difficultyLevel']);

    // Process YouTube Playlist Link and extract playlist ID
    parse_str(parse_url($playlistLink, PHP_URL_QUERY), $queryParams);
    $playlistID = $queryParams['list'] ?? ''; // Extract the 'list' parameter (Playlist ID)

    // Check for uploaded image
    if ($_FILES['image']['error'] === 0) {

        // Image upload settings
        $targetDir = "/Images/Upload/";
        $tempName = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $targetFile = $targetDir . $imageName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is valid
        $check = getimagesize($tempName);
        if ($check !== false) {
            // Move uploaded file to the target directory
            if (move_uploaded_file($tempName, $targetFile)) {

                // Prepare SQL query to insert course data
                $sql = "INSERT INTO courses
                        (course_title, abstract, description, thumbnail, price, playlist_link, duration, difficulty_level)
                        VALUES ('$courseTitle', '$courseAbstract', '$courseDescription', '$imageName',
                        '$courseAmount', '$playlistLink', '$courseDuration', '$difficultyLevel')";

                if (mysqli_query($conn, $sql)) {
                    // Redirect or give a success message
                    echo "<script>alert('Course added successfully!'); window.location.href='/Admin Panel/course-list.php';</script>";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Sorry, there was an error uploading your image.";
            }
        } else {
            echo "File is not a valid image.";
        }
    } else {
        echo "Please upload a course thumbnail.";
    }
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <style>
        .img-thumbnail {
            height: 100px;
            width: 100px;
        }

        .preview-image {
            height: 200px;
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Include the sidebar -->
        <?php
        include '../Includes/sidebar.php';
        ?>

        <!-- Main content area -->
        <div class="container p-5" style="margin-left: 280px; padding: 0;">
            <h1 class="text-center text-danger mb-4">Add New Course</h1>
            <p class="text-center">Enter course details to add a new course to the system.</p>


            <form id="courseForm" class="p-4 border bg-light rounded">
               
                <!-- Course Title -->
                <div class="mb-3">
                    <label for="courseTitle" class="form-label">Course Title</label>
                    <input type="text" id="courseTitle" name="courseTitle" class="form-control" placeholder="Give your course a title" required>
                </div>
                <hr>

                <!-- Course Abstract -->
                <div class="mb-3">
                    <label for="courseAbstract" class="form-label">Course Abstract</label>
                    <textarea id="courseAbstract" name="courseAbstract" class="form-control" rows="2" placeholder="Brief description of the course" required></textarea>
                </div>

                <hr>

                <!-- Course Description -->
                <div class="mb-3">
                    <label for="courseDescription" class="form-label">Course Description</label>
                    <textarea id="courseDescription" name="courseDescription" class="form-control" rows="4" placeholder="Describe the course in detail" required></textarea>
                </div>
                <hr>

                <!-- Photo Upload -->
                <div class="mb-3 row">
                    <label for="coursePhoto" class="form-label">Course Thumbnail*</label>
                    <div class="col-md-6">
                        <input type="file" id="coursePhoto" name="image" class="form-control" accept="image/*">

                        <!-- Suggested Image Button -->
                        <div class="mt-2">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#imageSuggestionModal" onclick="suggestMoreImages()">Suggest Image</button>

                        </div>
                    </div>
                    <small class="text-muted mt-2">Use JPEG or PNG. Must be at least 960 x 960. Max file size: 30MB</small>
                </div>
                <hr>

                <!-- Course Amount -->
                <div class="mb-3">
                    <label for="courseAmount" class="form-label">Course Amount (Price in Taka)</label>
                    <input type="number" id="courseAmount" name="courseAmount" class="form-control" placeholder="Enter the price for this course" required>
                </div>
                <hr>

                <!-- Playlist Link -->
                <div class="mb-3">
                    <label for="playlistLink" class="form-label">YouTube Playlist Link</label>
                    <input type="url" id="playlistLink" name="playlistLink" class="form-control" placeholder="Add the playlist link for this course" required>
                </div>
                <hr>

                <!-- Time Section -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="courseDuration" class="form-label">Course Duration (in hours)</label>
                        <input type="number" id="courseDuration" name="courseDuration" class="form-control" placeholder="e.g. 20" min="0" required>
                    </div>
                    <div class="col-md-6">
                        <label for="difficultyLevel" class="form-label">Difficulty Level</label>
                        <select id="difficultyLevel" name="difficultyLevel" class="form-control" required>
                            <option value="">Select Level</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                        </select>
                    </div>
                </div>
                <hr>

                <!-- Buttons -->
                <div class="container d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-secondary me-4" id="cancel">Cancel</button>
                    <button type="submit" class="btn btn-danger" id="submitCourse" name="submit">Submit Course</button>
                </div>

            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageSuggestionModal" tabindex="-1" aria-labelledby="imageSuggestionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageSuggestionModalLabel">Suggested Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="preview-container" class="d-flex mb-3">
                        <img id="clicked-image-preview" class="preview-image" src="" alt="Preview" style="display:none;">
                    </div>


                    <div id="suggested-images" class="d-flex flex-row flex-nowrap gap-2 overflow-auto">
                        <!-- Example images for layout -->

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="suggestMoreImages()">Suggest More Images</button>
                    <button class="btn btn-success" id="save-image" style="display:none;" onclick="saveSelectedImage()">Save Selected Image</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Image Suggestion Script -->
    <script>
        let selectedImage = null;
        const unsplashAccessKey = '1M1z_bPvJVrEoO9vtt1DR0wPwyMtj_kPJbr0Ljju2o8';

        function suggestMoreImages() {
            const courseTitle = document.getElementById('courseTitle').value;
            if (!courseTitle) {
                alert("Please enter a course title first.");
                return;
            }

            const query = courseTitle.trim().replace(/\s+/g, '+'); // Format the course title for the query
            const unsplashUrl = `https://api.unsplash.com/search/photos?query=${query}&client_id=${unsplashAccessKey}&per_page=6`;

            fetch(unsplashUrl)
                .then(response => response.json())
                .then(data => {
                    const imagesContainer = document.getElementById('suggested-images');
                    imagesContainer.innerHTML = ''; // Clear previous suggestions

                    if (data.results.length === 0) {
                        imagesContainer.innerHTML = '<p>No images found. Try another title.</p>';
                        return;
                    }

                    data.results.forEach(image => {
                        const imgElement = document.createElement('img');
                        imgElement.src = image.urls.small;
                        imgElement.classList.add('img-thumbnail', 'm-2');
                        imgElement.style.cursor = 'pointer';
                        imgElement.onclick = () => selectImage(imgElement);
                        imagesContainer.appendChild(imgElement);
                    });
                })
                .catch(error => {
                    console.error('Error fetching images:', error);
                    alert("Error fetching images. Please try again later.");
                });
        }

        function selectImage(img) {
            // Deselect any previously selected images
            document.querySelectorAll('#suggested-images img').forEach(image => {
                image.classList.remove('selected');
            });

            // Highlight the clicked image and set as selected
            img.classList.add('selected');
            selectedImage = img.src; // Store the selected image URL
            document.getElementById('clicked-image-preview').src = selectedImage; // Show preview
            document.getElementById('clicked-image-preview').style.display = 'block'; // Show preview
            document.getElementById('save-image').style.display = 'block'; // Show save button
        }

        function saveSelectedImage() {
            if (selectedImage) {
                alert(`Image saved: ${selectedImage}`); // Placeholder: Save the image URL in the form or database
            } else {
                alert('Please select an image.');
            }
        }
    </script>
</body>

</html>