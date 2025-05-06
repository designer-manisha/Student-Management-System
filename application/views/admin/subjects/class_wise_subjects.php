<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<?php $this->load->view('admin/include/header'); ?>

<!-- <br><br><br> -->

<div class="container-fluid col-md-11" id="content">
    <div class="row">

        <div class="col-md-2">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <div class="col-md-10 mt-3">
            <div class="card shadow">
                <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #1A4870;">
                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm">Back</a>
                    <h6 class="mb-0 text-white small">*** Class Wise Subjects ***</h6>
                    <a href="<?= site_url('AssignSubjectController/view_assignments'); ?>" class="btn btn-light btn-sm">Subject Details</a>
                </div>

                <div class="card-body">
                    <form method="post">
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <select name="class_id" class="form-control">
                                    <option value="">Select Class</option>
                                    <?php foreach ($classes as $class): ?>
                                        <option value="<?= $class->id ?>"><?= $class->class_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>

                    <?php if (!empty($assignments)): ?>
                        <hr>
                        <h5 class="text-success small">Class-wise Assigned Subjects for</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Subject</th>
                                    <th>Teacher</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($assignments as $a): ?>
                                    <tr>
                                        <td><?= $a->class_name ?></td>
                                        <td><?= $a->section ?></td>
                                        <td><?= $a->subject_name ?></td>
                                        <td><?= $a->teacher_name ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                        <p>No data found for this class.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('admin/include/footer'); ?>

<!-- <div class="container mt-4">
    <h3>Class-wise Assigned Subjects</h3>
    <form method="post" action="">
        <div class="row mb-3">
            <div class="col-md-4">
                <select name="class_id" class="form-control" required>
                    <option value="">Select Class</option>
                    <?php foreach ($classes as $class): ?>
                        <option value="<?= $class->id ?>"><?= $class->class_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <?php if (!empty($assignments)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Subject</th>
                    <th>Teacher</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assignments as $a): ?>
                    <tr>
                        <td><?= $a->class_name ?></td>
                        <td><?= $a->section ?></td>
                        <td><?= $a->subject_name ?></td>
                        <td><?= $a->teacher_name ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <p>No data found for this class.</p>
    <?php endif; ?>
</div> -->