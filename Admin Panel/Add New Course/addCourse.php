<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />
    
    <!-- css -->

</head>

<body>
    <div class="d-flex">
        <!-- Include the sidebar -->
        <?php
        include '/Cook-Corner/Admin Panel/Includes/sidebar.php';
        ?>

        <!-- Main content area -->
        <div class="container p-5" style=" 
            margin-left: 280px;
            padding: 0;">


            <h1 class="text-center text-danger mb-4">Add New Course</h1>
            <p class="text-center">Enter course details to add a new course to the system.</p>

            <form id="courseForm" class="p-4 border bg-light rounded">
                <hr>
                <!-- Course Title -->
                <div class="mb-3">
                    <label for="courseTitle" class="form-label">Course Title</label>
                    <input type="text" id="courseTitle" class="form-control" placeholder="Give your course a title" required>
                </div>
                <hr>

                <!-- Course Abstract -->
                <div class="mb-3">
                    <label for="description" class="form-label">Course Abstract</label>
                    <textarea id="description" class="form-control" rows="2" placeholder="Describe the course, its contents, and objectives" required></textarea>
                 </div>
 
            
                <hr>

                <!-- Course Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Course Description</label>
                    <textarea id="description" class="form-control" rows="4"
                        placeholder="Describe the course, its contents, and objectives" required></textarea>
                </div>
                <hr>

                <!-- Photo Upload -->
                <div class="mb-3 row">
                    <label for="recipePhoto" class="form-label">Course Thumbnail</label>
                    <div class="col-md-6">
                        <input type="file" id="recipePhoto" class="form-control" accept="image/*">

                        <!-- Container for suggested images -->
                        <div id="suggested-images" class="mt-2">
                            <!-- Suggest Image Button -->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#imageSuggestionModal">Suggest Image</button>

                            <!-- Modal -->
                            <div class="modal fade" id="imageSuggestionModal" tabindex="-1" role="dialog" aria-labelledby="imageSuggestionModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageSuggestionModalLabel">Suggested Images</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="preview-container" class="d-flex">
                                                <img id="clicked-image-preview" class="preview-image" src="" alt="Preview" style="display:none;">
                                            </div>
                                            <div id="suggested-images">
                                                <img src="image1.jpg" alt="Image 1" onclick="selectImage(this)">
                                                <img src="image2.jpg" alt="Image 2" onclick="selectImage(this)">
                                                <img src="image3.jpg" alt="Image 3" onclick="selectImage(this)">
                                                <img src="image4.jpg" alt="Image 4" onclick="selectImage(this)">
                                                <img src="image5.jpg" alt="Image 5" onclick="selectImage(this)">
                                                <img src="image6.jpg" alt="Image 6" onclick="selectImage(this)">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" onclick="suggestMoreImages()">Suggest More Images</button>
                                            <button class="btn btn-success" id="save-image" style="display:none;" onclick="saveSelectedImage()">Save Selected Image</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                        <script>
                            let selectedImage = null;

                            function selectImage(img) {
                                // Remove selection from previously selected images
                                const allImages = document.querySelectorAll('#suggested-images img');
                                allImages.forEach(image => image.classList.remove('selected'));

                                // Select the clicked image
                                img.classList.add('selected');
                                selectedImage = img.src; // Store the selected image URL
                                document.getElementById('clicked-image-preview').src = selectedImage; // Show preview
                                document.getElementById('clicked-image-preview').style.display = 'block'; // Show the preview
                                document.getElementById('save-image').style.display = 'block'; // Show save button
                            }

                            function suggestMoreImages() {
                                // Logic to generate new images (not implemented here)
                                alert("New images suggested!"); // Placeholder alert
                            }

                            function saveSelectedImage() {
                                if (selectedImage) {
                                    alert(`Image saved: ${selectedImage}`); // Placeholder action
                                }
                            }
                        </script>
                    </div>
                    <small class="text-muted mt-2">Use JPEG or PNG. Must be at least 960 x 960. Max file size: 30MB</small>
                </div>
                <hr>

                <!-- Image segment end-->


                <!-- Course Amount -->
                <div class="mb-3">
                    <label for="courseAmount" class="form-label">Course Amount (Price in Taka)</label>
                    <input type="number" id="courseAmount" class="form-control" placeholder="Enter the price for this course" required>
                </div>
                <hr>

                <!-- Playlist Link -->
                <div class="mb-3">
                    <label for="playlistLink" class="form-label">YouTube Playlist Link</label>
                    <input type="url" id="playlistLink" class="form-control" placeholder="Add the playlist link for this course" required>
                </div>
                <hr>

                <!-- Time Section -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="duration" class="form-label">Course Duration (in hours)</label>
                        <input type="number" id="duration" class="form-control" placeholder="e.g. 20" min="0" required>
                    </div>
                    <div class="col-md-6">
                        <label for="difficultyLevel" class="form-label">Difficulty Level</label>
                        <select id="difficultyLevel" class="form-control" required>
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
                    <button type="submit" class="btn btn-danger" id="submitCourse">Submit Course</button>
                </div>

            </form>
        </div>
    </div>

    <script>
        // Adding more modules dynamically
        document.getElementById('addModule').addEventListener('click', function() {
            var newModule = document.createElement('input');
            newModule.type = 'text';
            newModule.name = 'module[]';
            newModule.classList.add('form-control', 'mb-2');
            newModule.placeholder = 'e.g. Advanced Machine Learning';
            document.getElementById('modulesList').appendChild(newModule);
        });

        // Cancel button functionality
        document.getElementById('cancel').addEventListener('click', function() {
            window.location.href = '/Admin Panel/course-list.php'; // Redirect to course list page (replace with your actual link)
        });
    </script>

</body>

</html>