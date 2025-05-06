<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid" id="content">
    <div class="row">
        <div class="col-md-2">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <!-- Main Content -->

        <div class="col-md-10 mt-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-white">Edit Assignment</h5>
                </div>

                <div class="card-body">
                    <form method="post" action="<?= base_url('AssignSubjectController/update/' . $assignment->id) ?>">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label for="class_id">Class</label>
                                <select name="class_id" class="form-control" required>
                                    <option value="">Select Class</option>
                                    <?php foreach ($classes as $class): ?>
                                        <option value="<?= $class->id ?>" <?= ($assignment->class_id == $class->id) ? 'selected' : '' ?>>
                                            <?= $class->class_name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="section">Section</label>
                                <input type="text" name="section" class="form-control" value="<?= $assignment->section ?>" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="subject_id">Subject</label>
                                <select name="subject_id" class="form-control" required>
                                    <option value="">Select Subject</option>
                                    <?php foreach ($subjects as $subject): ?>
                                        <option value="<?= $subject->id ?>" <?= ($assignment->subject_id == $subject->id) ? 'selected' : '' ?>>
                                            <?= $subject->subject_name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="teacher_id">Teacher</label>
                                <select name="teacher_id" class="form-control" required>
                                    <option value="">Select Teacher</option>
                                    <?php foreach ($teachers as $teacher): ?>
                                        <option value="<?= $teacher->id ?>" <?= ($assignment->teacher_id == $teacher->id) ? 'selected' : '' ?>>
                                            <?= $teacher->name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">Update Assignment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/include/footer'); ?>
