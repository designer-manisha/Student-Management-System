<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid" id="content">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 ">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>


        <!-- Main Content -->

        <div class="col-md-10 mt-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <!-- <h5 class="mb-0">Manage Telecallers</h5> -->
                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm">Back</a>
                    <h6 class="mb-0 text-white small">*** Edit Student ***</h6>
                    <a href="<?= site_url('student/add'); ?>" class="btn btn-light btn-sm">
                        + Add Student
                    </a>
                </div>

                <div class="card-body">
                    <!-- <table class="table table-striped table-bordered">
                        <thead class="table-dark text-center"></thead>
                    </table> -->

                    <form method="post" action="<?php echo site_url('student/update/' . $student['id']); ?>">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $student['name']; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $student['email']; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $student['phone']; ?>" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select form-control" required>
                                    <option value="Male" <?php if ($student['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                    <option value="Female" <?php if ($student['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" value="<?php echo $student['dob']; ?>" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Class</label>
                                <input type="text" name="class_id" class="form-control" value="<?php echo $student['class_id']; ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="class" class="form-control" value="<?php echo $student['address']; ?>" required>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>
