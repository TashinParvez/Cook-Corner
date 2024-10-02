<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .fab {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #28a745;
      color: white;
      border-radius: 50%;
      padding: 15px;
      font-size: 24px;
      border: none;
      cursor: pointer;
      z-index: 1000;
    }

    .fab-options {
      display: none;
      position: fixed;
      bottom: 80px;
      right: 20px;
    }

    .fab-options .fab-option {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <!-- Floating Action Button -->
  <button class="fab" id="fab">+</button>

  <!-- FAB Options -->
  <div class="fab-options" id="fabOptions">
    <button class="btn btn-primary fab-option">Add Tips</button>
    <button class="btn btn-primary fab-option">Add Recipe</button>
  </div>

  <script>
    // Toggle FAB options
    document.getElementById('fab').addEventListener('click', function() {
      var fabOptions = document.getElementById('fabOptions');
      if (fabOptions.style.display === 'none' || fabOptions.style.display === '') {
        fabOptions.style.display = 'block';
      } else {
        fabOptions.style.display = 'none';
      }
    });
  </script>

</body>
</html>
