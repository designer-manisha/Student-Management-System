<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid" id="content">
    <div class="row">

        <div class="col-md-2">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <div class="col-md-10 mt-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    Assign Subject to Class
                </div>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>


                <div class="card-body">
                    <form action="<?= base_url('AssignSubjectController/assign') ?>" method="post">

                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label>Class</label>
                                <select name="class_id" class="form-control" required>
                                    <option value="">-- Select Class --</option>
                                    <?php foreach ($classes as $class): ?>
                                        <option value="<?= $class->id ?>"><?= $class->class_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Section</label>
                                <input type="text" name="section" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Subject</label>
                                <select name="subject_id" class="form-control" required>
                                    <option value="">-- Select Subject --</option>
                                    <?php foreach ($subjects as $sub): ?>
                                        <option value="<?= $sub->id ?>"><?= $sub->subject_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Teacher</label>
                                <select name="teacher_id" class="form-control" required>
                                    <option value="">-- Select Teacher --</option>
                                    <?php foreach ($teachers as $teacher): ?>
                                        <option value="<?= $teacher->id ?>"><?= $teacher->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Assign</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
