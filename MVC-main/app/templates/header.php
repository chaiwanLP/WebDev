<?php
    if(isset($_SESSION['student_id'])) {
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-success sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand text-black" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"> 
    <?php if (!isset($_SESSION['student_id'])): ?>
        <li class="nav-item">
            <a class="nav-link btn btn-outline-success me-2" href="login">Login</a>
        </li>
    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link btn btn-outline-success me-2" href="/info">Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn btn-outline-success me-2" href="/courses_new">Course</a>
        </li>
        <li class="nav-item">
            <a href="/logout" 
                class="nav-link btn btn-outline-danger" 
                onclick="return confirm('You Want to Logout?');">
                Logout?
            </a>
        </li>
    <?php endif; ?>
</ul>

            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
