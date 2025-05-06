<?php $this->load->view('/home/includes/header'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-primary text-white d-flex flex-column justify-content-between vh-100">

    <!-- Main Content -->
    <main class="d-flex justify-content-center align-items-center flex-grow-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-lg">
                        <div class="card-body text-center">
                            <h2 class="card-title mb-4 fw-bold">Login to Continue</h2>
                            <p class="mb-4">Explore amazing features by logging in or registering.</p>
                            <div class="d-grid gap-3">
                                <a href="login" class="btn btn-primary btn-lg">Login</a>
                                <a href="register" class="btn btn-outline-primary btn-lg">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php $this->load->view('/home/includes/footer'); ?>