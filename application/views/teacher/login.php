<!DOCTYPE html>
<html>
<head>
    <title>Teacher Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">👨‍🏫 Teacher Login</h3>

            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>

            <form method="POST" action="<?= base_url('TeacherDashboard/login_check') ?>">
                <div class="mb-3">
                    <label class="form-label">📧 Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">🔒 Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required />
                </div>
                <button type="submit" class="btn btn-primary w-100 rounded-pill">🔐 Login</button>
            </form>
        </div>
    </div>

</body>
</html>
