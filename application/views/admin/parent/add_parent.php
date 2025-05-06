<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

<!-- <div class="main-content " style="margin-left: 250px;"> 
    <div class="container py-5">
        <div class="row justify-content-center"> -->

<div class="container-fluid col-md-11" id="content">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 ">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>
        <div class="col-md-10 mt-3">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <!-- <h5 class="mb-0">Manage Telecallers</h5> -->
                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm">Back</a>
                    <h6 class="mb-0 text-white small">*** Add Parents ***</h6>
                    <a href="<?= site_url('parents/view'); ?>" class="btn btn-light btn-sm">
                        View Parents
                    </a>
                </div>
                <!-- <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Add New Student</h4>
                    </div> -->

                </br>
                <div class="card-body">
                    <form method="post" action="<?php echo site_url('parents/insert'); ?>">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Parent Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Parent Name" value="<?= set_value('name'); ?>">
                                <span class="text-danger small"><?php echo form_error('name'); ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?= set_value('email'); ?>">
                                <span class="text-danger small"><?php echo form_error('email'); ?></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact</label>
                                <input type="phone" name="phone" class="form-control" placeholder="Enter phone number" value="<?= set_value('phone'); ?>">
                                <span class="text-danger small"><?php echo form_error('phone'); ?></span>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password" value="<?= set_value('password'); ?>">
                                <span class="text-danger small"><?php echo form_error('password'); ?></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="3" placeholder="Enter address"></textarea>
                                <span class="text-danger small"><?php echo form_error('address'); ?></span>
                            </div>
                        </div>

                        <div class="text-end mt-2">
                            <button type="submit" class="btn btn-success">Add Parent</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php $this->load->view('admin/include/footer'); ?>