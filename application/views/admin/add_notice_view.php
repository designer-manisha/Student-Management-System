<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid" id="content">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-dark">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 mt-4">
            <div class="card shadow">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-light">Add New Notice</h5>
                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>

                <div class="card-body">
                    <form method="post" action="<?= base_url('Admin/save_notice') ?>" class="needs-validation" novalidate>
                        <div class="row g-3">
                            <!-- Title -->
                            <div class="col-md-12">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" required>
                                <div class="invalid-feedback">Please enter a title</div>
                            </div>

                            <!-- Message -->
                            <div class="col-md-12 mt-2">
                                <label class="form-label">Message <span class="text-danger">*</span></label>
                                <textarea name="message" class="form-control" rows="5" required></textarea>
                                <div class="invalid-feedback">Please enter a message</div>
                            </div>

                            <!-- Audience -->
                            <div class="col-md-6 mt-2">
                                <label class="form-label">Audience <span class="text-danger">*</span></label>
                                <select name="audience" class="form-select form-control" required>
                                    <option value="">Select Audience</option>
                                    <option value="All">All</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="Student">Student</option>
                                </select>
                                <div class="invalid-feedback">Please select an audience</div>
                            </div>

                            <!-- Notice Date -->
                            <div class="col-md-6 mt-2">
                                <label class="form-label">Notice Date <span class="text-danger">*</span></label>
                                <input type="date" name="notice_date" class="form-control" required>
                                <div class="invalid-feedback">Please select a date</div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-dark">
                                    <i class="bi bi-send"></i> Publish Notice
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.form-label {
    /* font-weight: 500; */
    color: #1A4870;
}

.form-control:focus, .form-select:focus {
    border-color: #1A4870;
    box-shadow: 0 0 0 0.2rem rgba(26, 72, 112, 0.25);
}

/* Sidebar Styles */
.bg-dark {
    background-color: #1A4870 !important;
}

/* Button Hover Effects */
.btn-dark:hover {
    background-color: #2c6aa0;
    border-color: #2c6aa0;
}

/* Card Header */
.card-header {
    border-bottom: 2px solid #2c6aa0;
}

/* Form Validation Styles */
.was-validated .form-control:invalid,
.was-validated .form-select:invalid {
    border-color: #dc3545;
}

.was-validated .form-control:valid,
.was-validated .form-select:valid {
    border-color: #198754;
}
</style>

<script>
// Form Validation
(function() {
    'use strict';
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
</script>

<?php $this->load->view('admin/include/footer'); ?>
