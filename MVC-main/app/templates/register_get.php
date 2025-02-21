
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg rounded p-4">
                <h1 class="text-center mb-4">Register</h1>

                <?php if (!empty($error)): ?>
                    <p class="text-danger text-center"><?php echo htmlspecialchars($error); ?></p>
                <?php endif; ?>

                <form action="register" method="post">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name" required>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" required>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control w-100" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control w-100" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" >
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone" required>
                    </div>    


                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-success w-75">
                    </div>

                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="login_get.php" class="text-primary">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
