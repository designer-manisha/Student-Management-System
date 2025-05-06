<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid col-md-11" id="content">
    <div class="row">

        <div class="col-md-2">
            <?php $this->load->view('admin/include/sidebar');
            ?>
        </div>
        <div class="col-md-8 mt-3">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm">Back</a>
                    <h6 class="mb-0 text-white small">*** Add Class ***</h6>
                    <a href="<?= site_url('classes/view'); ?>" class="btn btn-light btn-sm">View Class</a>
                </div>

                <div class="card-body">
                    <form method="post">
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                            
                                <label>Class Name:</label>
                                <select name="class_name" class="form-control mt-2" required>
                                    <option value="">Select Class</option>
                                    <option value="Class One">Class One</option>
                                    <option value="Class Two">Class Two</option>
                                    <option value="Class Three">Class Three</option>
                                    <option value="Class Four">Class Four</option>
                                    <option value="Class Five">Class Five</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Section:</label>
                                <select name="section" id="section" class="form-control mt-2">
                                    <option value="">Select Section</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Class Teacher:</label>
                                <select name="class_teacher_id" class="form-control mt-2" required>
                                    <option value="">Select Teacher</option>
                                    <?php foreach ($teachers as $teacher): ?>
                                        <option value="<?= $teacher->id ?>"><?= $teacher->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success">Add Class</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



    <?php $this->load->view('admin/include/footer'); ?>