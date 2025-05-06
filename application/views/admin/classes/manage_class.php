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
                </div>

                <div class="card-body">
                    <form action="<?= base_url('ManageClassController/filter') ?>" method="post">
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <label for="classSelect" class="form-label">Select Class</label>
                                <select name="class_name" class="form-select form-control" id="classSelect">
                                    <option value="">-- Select Class --</option>
                                    <?php foreach ($class_names as $class): ?>
                                        <option value="<?= $class->class_name ?>" <?= isset($selected_class) && $selected_class == $class->class_name ? 'selected' : '' ?>>
                                            <?= $class->class_name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-3 mt-4">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>


                    <?php if (!empty($class_data)): ?>
                        <hr>
                        <h5> Class Details for <strong><?= $selected_class ?></strong></h5>
                        
                        <table class="table table-bordered mt-3">
                            <thead class="table-dark">
                                <tr>
                                    <th>Section</th>
                                    <th>Class Teacher</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($class_data as $row): ?>
                                    <tr>
                                        <td><?= $row->section ?></td>
                                        <td><?= $row->teacher_name ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php elseif (isset($selected_class)): ?>
                        <div class="alert alert-warning mt-3">No data found for <strong><?= $selected_class ?></strong>.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('admin/include/footer'); ?>