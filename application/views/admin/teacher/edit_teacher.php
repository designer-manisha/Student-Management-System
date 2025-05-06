<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid" id="content">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 ">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>


        <div class="col-md-10 mt-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm">Back</a>
                    <h5 class="mb-0 text-white small">*** Edit Teacher ***</h5>
                    <a href="<?= site_url('teacher/add'); ?>" class="btn btn-light btn-sm">
                        + Add Teacher
                    </a>
                </div>

                <div class="card-body">
                    <!-- <table class="table table-striped table-bordered">
                        <thead class="table-dark text-center"></thead>
                    </table> -->

                    <form method="post" action="<?php echo site_url('teacher/update/' . $teacher->id); ?>">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $teacher->name; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $teacher->email; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $teacher->phone; ?>" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select form-control" required>
                                <option value="Male" <?php if ($teacher->gender == 'Male') echo 'selected'; ?>>Male</option>
                                <option value="Female" <?php if ($teacher->gender == 'Female') echo 'selected'; ?>>Female</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control" value="<?php echo $teacher->subject; ?>" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="joining_date" value="<?php echo $teacher->joining_date; ?>" required>
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

