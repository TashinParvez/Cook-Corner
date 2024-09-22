<!-- spinner.php -->
<div class="loading-container" id="loadingSpinner">
    <!-- Logo -->
    <div class="logo">
        <img src="/Images/logo/cook_Corner_LOGO-removebg-mainPartOnly.png" alt="Your Website Logo" width="150">
    </div>

    <!-- Spinners -->
    <div class="spinners">
        <div class="spinner-grow spinner-grow-custom text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-secondary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-success" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-warning" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-info" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-light" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow spinner-grow-custom text-dark" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<style>
    .loading-container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: white;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        z-index: 9999;
    }

    .spinners {
        margin-top: 9px;
    }

    .spinner-grow-custom {
        width: 1rem;
        height: 1rem;
        opacity: 0.7;
    }
</style>
