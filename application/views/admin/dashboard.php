<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid" id="content">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-dark min-vh">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 mt-4">
            <!-- Welcome Section -->
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0 text-light">Welcome to Admin Dashboard</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">You have successfully logged in as an administrator.</p>
                </div>
            </div>

            <!-- Quick Access Cards -->
            <div class="row mt-5">
                <!-- Students Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Students</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $student_count ?? 0 ?></div>
                                    <a href="<?= site_url('student/view'); ?>" class="btn btn-primary btn-sm mt-2">
                                        <i class="bi bi-mortarboard-fill me-1"></i> View Students
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-mortarboard-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Teachers Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Teachers</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $teacher_count ?? 0 ?></div>
                                    <a href="<?= site_url('teacher/view'); ?>" class="btn btn-success btn-sm mt-2">
                                        <i class="bi bi-person-workspace me-1"></i> View Teachers
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-person-workspace fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Classes Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Total Classes</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $class_count ?? 0 ?></div>
                                    <a href="<?= site_url('classes/view'); ?>" class="btn btn-info btn-sm mt-2">
                                        <i class="bi bi-book me-1"></i> View Classes
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  

                <!-- Parents Card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Parents</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $parent_count ?? 0 ?></div>
                                    <a href="<?= site_url('parents/view'); ?>" class="btn btn-warning btn-sm mt-2">
                                        <i class="bi bi-people-fill me-1"></i> View Parents
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Sidebar Styles */
.bg-dark {
    background-color: #1A4870 !important;
}

/* Card Styles */
.border-left-primary {
    border-left: 4px solid #4e73df !important;
}

.border-left-success {
    border-left: 4px solid #1cc88a !important;
}

.border-left-warning {
    border-left: 4px solid #f6c23e !important;
}

.border-left-info {
    border-left: 4px solid #36b9cc !important;
}

.card {
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-5px);
}

/* Card Header */
.card-header {
    border-bottom: 2px solid #2c6aa0;
}

/* Button Hover Effects */
.btn-primary:hover {
    background-color: #2e59d9;
    border-color: #2e59d9;
}

.btn-success:hover {
    background-color: #17a673;
    border-color: #17a673;
}

.btn-info:hover {
    background-color: #2c9faf;
    border-color: #2c9faf;
}

.btn-warning:hover {
    background-color: #dda20a;
    border-color: #dda20a;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .col-md-2 {
        width: 100%;
        min-height: auto !important;
    }
    
    .col-md-10 {
        width: 100%;
        margin-top: 1rem !important;
    }
    
    .card {
        margin-bottom: 1rem;
    }
    
    .col-xl-3 {
        padding: 0 10px;
    }
}
</style>

<?php $this->load->view('admin/include/footer'); ?>