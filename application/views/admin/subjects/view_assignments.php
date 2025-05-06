<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid" id="content">
    <div class="row">
        <div class="col-md-2">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <div class="col-md-10 mt-4">
            <div class="card shadow">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-white">Assigned Subjects</h5>
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


                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($assignments as $row): ?>
                                <tr>
                                    <td><?= $row->class_name ?></td>
                                    <td><?= $row->section ?></td>
                                    <td><?= $row->subject_name ?></td>
                                    <td><?= $row->teacher_name ?></td>
                                    <td>
                                        <a href="<?= base_url('AssignSubjectController/edit/' . $row->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="<?= base_url('AssignSubjectController/delete/' . $row->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/include/footer'); ?>
