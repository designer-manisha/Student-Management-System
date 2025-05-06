<?php $this->load->view('admin/include/header'); ?>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->

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
                    <h6 class="mb-0 text-white small">*** Add Subject ***</h6>
                    <a href="<?= site_url('subjects/view'); ?>" class="btn btn-light btn-sm">
                        View Subjects
                    </a>
                </div>

                <?php if($this->session->flashdata('error')): ?>
            <div style="color: red; font-weight: bold;" class="text-center">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('success')): ?>
            <div style="color: green; font-weight: bold;" class= text-center>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

                <div class="card-body">
                    <form method="post">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label>Subject Name:</label>
                                <input type="text" name="subject_name" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Select Class:</label>
                                <select name="class_id" class="form-control" required>
                                    <option value="">-- Select Class --</option>
                                    <?php foreach ($classes as $class): ?>
                                        <option value="<?= $class->id ?>"><?= $class->class_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-success">Add Subject</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- <body class="p-5">
    <div class="container">
        <h2>Add Subject</h2>
        <form method="post">
            <div class="mb-3">
                <label>Subject Name:</label>
                <input type="text" name="subject_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Select Class:</label>
                <select name="class_id" class="form-control" required>
                    <option value="">-- Select Class --</option>
                    <?php foreach ($classes as $class): ?>
                        <option value="<?= $class->id ?>"><?= $class->class_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Subject</button>
        </form>
    </div> -->

    <?php $this->load->view('admin/include/footer'); ?>