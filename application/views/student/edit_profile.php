<?php $this->load->view('student/include/header.php'); ?>
<?php $this->load->view('student/include/sidebar.php'); ?>

<!-- Main Content -->
<main class="col-md-12 col-lg-10 px-4">
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Profile Card -->
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center rounded-top-4">
                        <h3 class="mb-0">👨‍🎓 Student Profile</h3>
                    </div>

                    <div class="card-body">
                        <!-- Profile Information -->
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Name</div>
                            <div class="col-sm-8"><?= $student['name'] ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Email</div>
                            <div class="col-sm-8"><?= $student['email'] ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Phone</div>
                            <div class="col-sm-8"><?= $student['phone'] ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Gender</div>
                            <div class="col-sm-8"><?= $student['gender'] ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Date of Birth</div>
                            <div class="col-sm-8"><?= $student['dob'] ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Class</div>
                            <div class="col-sm-8"><?= isset($student['class']) ? $student['class'] : 'N/A'; ?></div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Address</div>
                            <div class="col-sm-8"><?= $student['address'] ?></div>
                        </div>
                    </div>

                    <!-- Footer with Buttons -->
                    <div class="card-footer text-end bg-white border-0">
                        <a href="<?= base_url('StudentDashboard/student_dashboard') ?>" class="btn btn-outline-secondary btn-lg mx-2">
                            ⬅ Back to Dashboard
                        </a>
                        <a href="<?= base_url('StudentDashboard/edit_profile') ?>" class="btn btn-primary btn-lg mx-2">
                            ✍️ Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
