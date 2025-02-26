<?php if (!empty($error)): ?>
    <div class="alert alert-danger text-center">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="row w-100 mt-5">
        <div class="col-md-6 col-lg-4 mx-auto mt-5">
            <div class="card shadow-lg rounded-4 p-4 bg-light mt-5">
                <h2 class="text-center mb-4">Login</h2>

                <form action="login" method="post">
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

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </div>

                    <p class="text-center mt-3">
                        Don't have an account? <a href="Register">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
