<?php $this->load->view('teacher/include/header'); ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 p-0">
            <?php $this->load->view('teacher/include/sidebar'); ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-gear fs-4 me-3"></i>
                                    <h5 class="mb-0">Edit Profile</h5>
                                </div>
                                <a href="<?= base_url('TeacherDashboard/profile') ?>" class="btn btn-outline-light btn-sm">
                                    <i class="bi bi-arrow-left me-1"></i>Back
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <form method="post">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="name" name="name" 
                                                value="<?= $teacher->name ?>" required>
                                            <label for="name">
                                                <i class="bi bi-person-fill me-2"></i>Full Name
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="email" name="email" 
                                                value="<?= $teacher->email ?>" required>
                                            <label for="email">
                                                <i class="bi bi-envelope-fill me-2"></i>Email Address
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="phone" name="phone" 
                                                value="<?= $teacher->phone ?>">
                                            <label for="phone">
                                                <i class="bi bi-telephone-fill me-2"></i>Phone Number
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="gender" name="gender">
                                                <option value="Male" <?= $teacher->gender == 'Male' ? 'selected' : '' ?>>Male</option>
                                                <option value="Female" <?= $teacher->gender == 'Female' ? 'selected' : '' ?>>Female</option>
                                            </select>
                                            <label for="gender">
                                                <i class="bi bi-gender-ambiguous me-2"></i>Gender
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex gap-2 mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>Update Profile
                                    </button>
                                    <a href="<?= base_url('TeacherDashboard/index') ?>" class="btn btn-secondary">
                                        <i class="bi bi-x-circle me-2"></i>Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('teacher/include/footer'); ?>
