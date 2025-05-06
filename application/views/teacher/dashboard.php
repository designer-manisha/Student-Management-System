<?php $this->load->view('teacher/include/header'); ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 p-0">
            <?php $this->load->view('teacher/include/sidebar'); ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">
            <!-- Welcome Section -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0 text-light">Welcome, <?= $teacher->name ?></h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">You have successfully logged in as a teacher.</p>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row">
                <!-- Total Subjects Card -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow-sm h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Assigned Subjects</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_subjects ?></div>
                                    <a href="<?= base_url('TeacherDashboard/my_subjects'); ?>" class="btn btn-primary btn-sm mt-2">
                                        <i class="bi bi-book me-1"></i> View Subjects
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Students Card -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow-sm h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Students</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_students ?></div>
                                    <a href="<?= base_url('TeacherDashboard/my_student'); ?>" class="btn btn-success btn-sm mt-2">
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

                <!-- Appointments Card -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-warning shadow-sm h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Upcoming Appointments</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_appointments ?></div>
                                    <a href="<?= base_url('TeacherDashboard/view_appointments'); ?>" class="btn btn-warning btn-sm mt-2">
                                        <i class="bi bi-calendar-check me-1"></i> View Appointments
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-calendar-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white">
                            <h5 class="mb-0 text-light">Quick Actions</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <a href="<?= base_url('TeacherDashboard/attendance_form'); ?>" class="btn btn-primary w-100">
                                        <i class="bi bi-calendar-plus me-1"></i> Mark Attendance
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="<?= base_url('TeacherDashboard/view_attendance'); ?>" class="btn btn-info w-100">
                                        <i class="bi bi-calendar-check me-1"></i> View Attendance
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="<?= base_url('TeacherDashboard/notices'); ?>" class="btn btn-success w-100">
                                        <i class="bi bi-bell me-1"></i> Notice Board
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="<?= base_url('TeacherDashboard/profile'); ?>" class="btn btn-secondary w-100">
                                        <i class="bi bi-person me-1"></i> My Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<?php $this->load->view('teacher/include/footer'); ?>



