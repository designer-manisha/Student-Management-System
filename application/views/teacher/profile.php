<?php $this->load->view('teacher/include/header'); ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 p-0">
            <?php $this->load->view('teacher/include/sidebar'); ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4 pt-5">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <!-- Profile Card -->
                    <div class="card profile-card shadow-sm border-0">
                        <div class="card-body text-center">
                            <div class="profile-avatar mb-4">
                                <div class="avatar-circle">
                                    <?= substr($teacher->name, 0, 1) ?>
                                </div>
                            </div>
                            <h4 class="mb-1"><?= $teacher->name ?></h4>
                            <p class="text-muted mb-3">
                                <i class="bi bi-mortarboard-fill me-1"></i>
                                <?= $teacher->subject ?> Teacher
                            </p>
                            <div class="profile-stats mb-4">
                                <div class="row text-center">
                                    <div class="col-6 border-end">
                                        <h5 class="mb-1"><?= $total_subjects ?? 0 ?></h5>
                                        <small class="text-muted">Subjects</small>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="mb-1"><?= $total_students ?? 0 ?></h5>
                                        <small class="text-muted">Students</small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <a href="<?= base_url('TeacherDashboard/edit_profile') ?>" class="btn btn-primary">
                                    <i class="bi bi-pencil-square me-2"></i>Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <!-- Details Card -->
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="bi bi-person-lines-fill me-2"></i>Personal Information
                            </h5>
                            <span class="badge bg-light text-dark">
                                <i class="bi bi-clock me-1"></i>Member since <?= date('M Y', strtotime($teacher->joining_date)) ?>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                        <div class="info-content">
                                            <label class="text-muted mb-1">Full Name</label>
                                            <h6 class="mb-0"><?= $teacher->name ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="bi bi-envelope-fill"></i>
                                        </div>
                                        <div class="info-content">
                                            <label class="text-muted mb-1">Email Address</label>
                                            <h6 class="mb-0"><?= $teacher->email ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="bi bi-telephone-fill"></i>
                                        </div>
                                        <div class="info-content">
                                            <label class="text-muted mb-1">Phone Number</label>
                                            <h6 class="mb-0"><?= $teacher->phone ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="bi bi-gender-ambiguous"></i>
                                        </div>
                                        <div class="info-content">
                                            <label class="text-muted mb-1">Gender</label>
                                            <h6 class="mb-0"><?= $teacher->gender ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="bi bi-book-fill"></i>
                                        </div>
                                        <div class="info-content">
                                            <label class="text-muted mb-1">Subject</label>
                                            <h6 class="mb-0"><?= $teacher->subject ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class="bi bi-calendar-check-fill"></i>
                                        </div>
                                        <div class="info-content">
                                            <label class="text-muted mb-1">Joining Date</label>
                                            <h6 class="mb-0"><?= date('d M, Y', strtotime($teacher->joining_date)) ?></h6>
                                        </div>
                                    </div>
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
.profile-card {
    background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
}
.profile-avatar {
    margin-top: -50px;
}
.avatar-circle {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, rgb(44, 16, 56) 0%, rgb(17, 78, 119) 100%);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    font-weight: 600;
    margin: 0 auto;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    border: 4px solid #fff;
}
.profile-stats {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 15px;
    margin: 20px 0;
}
.profile-stats h5 {
    color: #2c3e50;
    font-weight: 600;
}
.info-item {
    padding: 20px;
    border-radius: 12px;
    background: #f8f9fa;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 15px;
}
.info-item:hover {
    background: #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transform: translateY(-3px);
}
.info-icon {
    width: 45px;
    height: 45px;
    background: linear-gradient(135deg, rgb(44, 16, 56) 0%, rgb(17, 78, 119) 100%);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}
.info-content {
    flex: 1;
}
.info-item label {
    font-size: 0.85rem;
    font-weight: 500;
    color: #6c757d;
}
.info-item h6 {
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
}
.card {
    border-radius: 15px;
    overflow: hidden;
}
.card-header {
    border-bottom: none;
    padding: 1rem 1.5rem;
}
.btn-primary {
    background: linear-gradient(135deg, rgb(44, 16, 56) 0%, rgb(17, 78, 119) 100%);
    border: none;
    padding: 12px 25px;
    font-weight: 500;
    border-radius: 10px;
    transition: all 0.3s ease;
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
.badge {
    padding: 8px 12px;
    font-weight: 500;
    border-radius: 8px;
}
</style>

<?php $this->load->view('teacher/include/footer'); ?>

