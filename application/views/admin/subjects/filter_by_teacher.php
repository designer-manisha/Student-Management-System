<?php $this->load->view('admin/include/header'); ?>


<div class="container-fluide col-md-12" id="content">
    <div class="row">

            <div class="col-md-3">
                <?php $this->load->view('admin/include/sidebar'); ?>
            </div>

        <div class="col-md-8 mt-3">
            <div class="card shadow">
                <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #1A4870">
                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm">Back</a>
                    <h6 class="mb-0 text-white small">*** Class Wise Subject ***</h6>
                    <a href="<?=site_url('AssignSubjectController/view_assignments'); ?>" class="btn btn-light btn-sm">Subject Details</a>
                </div>

                <div class="card-body">
                    <form method="post" action="<?= base_url('AssignSubjectController/filterByTeacher') ?>">
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <select name="teacher_id" class="form-control" >
                                    <option value="">-- Select Teacher --</option>
                                    <?php foreach ($teachers as $teacher): ?>
                                        <option value="<?= $teacher->id ?>"><?= $teacher->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>

                    <?php if (isset($assigned_subjects)): ?>
                        <h4 class="text-success small">Subjects Assigned to <?= $teacher_name ?></h4>
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Subject</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($assigned_subjects as $row): ?>
                                    <tr>
                                        <td><?= $row->class_name ?></td>
                                        <td><?= $row->section ?></td>
                                        <td><?= $row->subject_name ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php elseif (isset($selected_teacher)): ?>
                        <div class="alert alert-warning mt-3">No data found for <strong><?= $selected_teacher ?></strong>.</div>
                    <?php endif; ?>

                </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>


