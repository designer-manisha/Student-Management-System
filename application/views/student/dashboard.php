<?php $this->load->view('student/include/header.php'); ?>
<?php $this->load->view('student/include/sidebar.php'); ?>

<!-- Main Content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center rounded-top-4">
                <h4 class="mb-0">🎓 Welcome, <?= $this->session->userdata('student_name') ?></h4>
            </div>

            <div class="card-body text-center">
                <h5 class="mb-3">📊 Dashboard Overview</h5>
                <p class="text-muted">
                    This is your student dashboard. Use the left menu to access your profile, subjects, class info, and more.
                </p>

                <!-- Optional Dashboard Widgets -->
                <div class="row mt-4">
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 shadow-sm rounded-3 h-100">
                            <div class="card-body">
                                <h6 class="card-title">📚 My Subjects</h6>
                                <p class="card-text">Check your subjects and assigned teachers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 shadow-sm rounded-3 h-100">
                            <div class="card-body">
                                <h6 class="card-title">🗓️ Appointments</h6>
                                <p class="card-text">Request or check appointments with teachers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 shadow-sm rounded-3 h-100">
                            <div class="card-body">
                                <h6 class="card-title">📢 Notices</h6>
                                <p class="card-text">Stay updated with latest notices from your school.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Widgets -->
            </div>
        </div>
    </div>
</main>
