<?php $this->load->view('admin/include/header'); ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif; ?>

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
                    <h6 class="mb-0 text-white small">*** Add Student ***</h6>
                    <a href="<?= site_url('student/view'); ?>" class="btn btn-light btn-sm">
                        View Students
                    </a>
                </div>

                <div class="card-body">
                    <form method="post" action="<?php echo base_url('student/insert'); ?>">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name" value="<?php echo set_value('name'); ?>">
                                <small class="text-danger"><?php echo form_error('name'); ?></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?= set_value('email'); ?>">
                                <small class="text-danger"><?php echo form_error('email'); ?></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter phone number" value="<?= set_value('phone'); ?>">
                                <small class="text-danger"><?php echo form_error('phone'); ?></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select form-control" >
                                    <option value="">Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                <small class="text-danger"><?php echo form_error('gender'); ?></small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control" value="<?= set_value('dob'); ?>" >
                                <small class="text-danger"><?php echo form_error('dob'); ?></small>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                            <option class="form-label">Select Class</option>
                                <select name="class_id" class="form-control" required>
                                    <option value="">select class</option>
                                    <?php foreach ($classes as $class): ?>
                                        <option value="<?= $class['id']; ?>">
                                            <?= $class['class_name']; ?> - <?= $class['section']; ?>    
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password" value="<?= set_value('password'); ?>">
                                <small class="text-danger"><?php echo form_error('password'); ?></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="3" placeholder="Enter address" value="<?= set_value('address'); ?>"></textarea>
                                <small class="text-danger"><?php echo form_error('address'); ?></small>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div><br>

<?php $this->load->view('admin/include/footer'); ?>