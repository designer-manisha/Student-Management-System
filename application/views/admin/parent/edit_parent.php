<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid col-md-11" id="content">
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
                    <h6 class="mb-0 text-white small">*** Edit Parent ***</h6>
                    <a href="<?= site_url('parents/add'); ?>" class="btn btn-light btn-sm">
                        + Add Parent
                    </a>
                </div>

                <div class="card-body">
                    <!-- <table class="table table-striped table-bordered">
                        <thead class="table-dark text-center"></thead>
                    </table> -->

                    <form method="post" action="<?php echo site_url('parents/update/'.$parent->id); ?>">
                        <div class="row g-3">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Parent Name</label>
                                <input type="text" name="name" class="form-control" value="<?= $parent->name ?>" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="<?= $parent->email ?>" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Contact</label>
                                <input type="phone" name="phone" class="form-control" value="<?= $parent->phone ?>" required>
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


