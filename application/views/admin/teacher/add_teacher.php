<?php $this->load->view('admin/include/header'); ?>

<!-- <div class="main-content" style="margin-left: 250px;" id="content"> 
    <div class="container py-5">
        <div class="row justify-content-center"> -->

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
                    <h6 class="mb-0 text-white small">*** Add Teacher ***</h6>
                    <a href="<?= site_url('teacher/view'); ?>" class="btn btn-light btn-sm">
                        View Teachers
                    </a>
                </div>
                <!-- <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Add New Student</h4>
                    </div> -->
                <div class="card-body">
                    <form method="post" action="<?php echo site_url('teacher/insert'); ?>">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name" value="<?= set_value('name'); ?>">
                                <span class="text-danger small"><?php echo form_error('name'); ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?= set_value('email'); ?>">
                                <span class="text-danger small"><?php echo form_error('email'); ?></span>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control" required>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter phone number" value="<?= set_value('phone'); ?>">
                                <span class="text-danger small"><?php echo form_error('phone'); ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select form-control" value="<?= set_value('gender'); ?>">
                                    <option value="">Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                <span class="text-danger small"><?php echo form_error('gender'); ?></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Subject</label>
                                <select name="subject" class="form-select form-control" value="<?= set_value('subject'); ?>">
                                    <option value="">Select Subject</option>
                                    <option>Math</option>
                                    <option>English</option>
                                    <option>Hindi</option>
                                    <option>Science</option>
                                    <option>Social Science</option>
                                </select>
                                <span class="text-danger small"><?php echo form_error('gender'); ?></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Joining Date</label>
                                <input type="date" name="joining_date" class="form-control" placeholder="joining_date" value="<?= set_value('joining_date'); ?>">
                                <span class="text-danger small"><?php echo form_error('joining_date'); ?></span>
                            </div>

                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php $this->load->view('admin/include/footer'); ?>