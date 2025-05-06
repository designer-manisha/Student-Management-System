
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container" style="margin-top: 200px;">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-primary text-center text-white">
                    <h4>Student Login</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('StudentDashboard/student_login_submit') ?>" method="POST">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required />
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required />
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <p class="mt-3 text-center">
                        Don't have an account? <a href="#">Register</a> 
                        <!-- Registration link baad me add karenge -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
