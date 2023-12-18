<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- Link to Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <style>
        /* Add your custom styles here */
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .form-container {
            max-width: 400px;
            margin: auto;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="form-container">
                    <!-- Sign Up Form -->
                    <form method="post" action="">
                        <h2 class="text-center">Sign Up</h2>
                        <div class="mb-3">
                            <label for="full name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="full name" name="full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">User name</label>
                            <input type="text" class="form-control" id="Username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JS and Popper.js (required for some Bootstrap components) via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
