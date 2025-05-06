<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Portal Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }
    .login-card {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      border: none;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    }
    .form-control {
      border-radius: 8px;
      padding: 12px;
      border: 1px solid #e0e0e0;
    }
    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }
    .btn-primary {
      padding: 12px;
      border-radius: 8px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    .login-icon {
      font-size: 3rem;
      color: #0d6efd;
      margin-bottom: 1rem;
    }
    .form-check-input:checked {
      background-color: #0d6efd;
      border-color: #0d6efd;
    }
    .forgot-password {
      color: #6c757d;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .forgot-password:hover {
      color: #0d6efd;
    }
    .alert {
      border-radius: 8px;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>

  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card login-card p-4" style="max-width: 400px; width: 100%; border-radius: 15px;">
      <div class="text-center mb-4">
        <i class="fas fa-user-shield login-icon"></i>
        <h3 class="fw-bold text-primary">Student <span class="text-dark">Management</span> System</h3>
        <h5 class="mt-2">
          <span class="badge bg-primary">Admin Portal Login</span>
        </h5>
      </div>

      <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="fas fa-exclamation-circle me-2"></i>
          <?php echo $this->session->flashdata('error'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo base_url('admin/do_login'); ?>" method="post" id="loginForm">
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" class="form-control" id="email" name="email" placeholder="admin@gmail.com" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
              <i class="fas fa-eye"></i>
            </button>
          </div>
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary" id="loginButton">
            <span class="spinner-border spinner-border-sm d-none me-2" role="status" aria-hidden="true"></span>
            Login
          </button>
        </div>

        <div class="text-center mt-3">
          <a href="#" class="forgot-password">Forgot Password?</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
      const password = document.getElementById('password');
      const icon = this.querySelector('i');
      
      if (password.type === 'password') {
        password.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        password.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });

    // Form submission with loading state
    document.getElementById('loginForm').addEventListener('submit', function() {
      const button = document.getElementById('loginButton');
      const spinner = button.querySelector('.spinner-border');
      const buttonText = button.querySelector('span:not(.spinner-border)');
      
      button.disabled = true;
      spinner.classList.remove('d-none');
      buttonText.textContent = 'Logging in...';
    });
  </script>
</body>
</html>
