<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid col-md-11" id="content">
    <div class="row">
        <div class="col-md-2">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <div class="col-md-10 mt-3">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justyfy-content-between align-items-center">

                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm">Back</a>
                    <!-- <h6 class="mb-0 text-white small">*** Edit Class ***</h6> -->
                    <marquee behavior="alternate" class="mb-0 text-white small">*** Edit Class ***</marquee>
                    <a href="<?= site_url('classes/view'); ?>" class="btn btn-light btn-sm">+ View Class</a>
                </div>

                <div class="card-body">
                    <form method="post">
                        <div class="row g-3">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Class Name:</label>
                                <select name="class_name" class="form-select form-control" required>
                                    <option value="">Select Class</option>
                                    <option value="Class One" <?php echo ($class_data->class_name == 'Class One') ? 'selected' : ''; ?>>Class One</option>
                                    <option value="Class Two" <?php echo ($class_data->class_name == 'Class Two') ? 'selected' : ''; ?>>Class Two</option>
                                    <option value="Class Three" <?php echo ($class_data->class_name == 'Class Three') ? 'selected' : ''; ?>>Class Three</option>
                                    <option value="Class Four" <?php echo ($class_data->class_name == 'Class Four') ? 'selected' : ''; ?>>Class Four</option>
                                    <option value="Class Five" <?php echo ($class_data->class_name == 'Class Five') ? 'selected' : ''; ?>>Class Five</option>
                                </select>
                                <!-- <input type="text" name="class_name" value="<?php //echo $class_data->class_name; ?>" class="form-control" required> -->
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Section:</label>
                                <select name="section" class="form-select form-control" required>
                                    <option value="">Select Section</option>
                                    <option value="A" <?php echo ($class_data->section == 'A') ? 'selected' : ''; ?>>A</option>
                                    <option value="B" <?php echo ($class_data->section == 'B') ? 'selected' : ''; ?>>B</option>
                                </select>
                                <!-- <input type="text" name="section" value="<?php //echo $class_data->section; ?>" class="form-control" required> -->
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Class Teacher:</label>
                                <select name="class_teacher_id" class="form-control mt-2" required>
                                    <option value="">Select Teacher</option>
                                    <?php foreach ($teachers as $teacher): ?>
                                        <option value="<?= $teacher->id ?>" <?= ($teacher->id == $class_data->class_teacher_id) ? 'selected' : '' ?>><?= $teacher->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<?php $this->load->view('admin/include/footer');?>