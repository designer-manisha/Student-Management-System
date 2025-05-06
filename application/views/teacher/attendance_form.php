<!-- <h4>Select Class & Subject</h4>
<form method="post" action="<?= base_url('TeacherDashboard/mark_attendance') ?>">
    <select name="class_id" required>
        <option value="">Select Class</option>
        <?php foreach ($assignments as $assignment): ?>
            <option value="<?= $assignment->class_id ?>_<?= $assignment->section ?>_<?= $assignment->subject_name ?>">
                <?= $assignment->class_name ?> - <?= $assignment->section ?> - <?= $assignment->subject_name ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="date" name="attendance_date" required>
    <button type="submit">Load Students</button>
</form>    -->

<!-- Header Load -->
<?php $this->load->view('teacher/include/header'); ?>

<div class="container-fluid col-md-12">
    <div class="row">
        <!-- Sidebar Load -->
        <?php $this->load->view('teacher/include/sidebar'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-9 py-md-4 py-4">
            <div class="card shadow rounded p-4">
                <h4 class="mb-4">Select Class & Subject</h4>
                <form method="post" action="<?= base_url('TeacherDashboard/mark_attendance') ?>" class="row g-3">
                    <div class="col-md-6">
                        <label for="class_id" class="form-label">Class - Section - Subject</label>
                        <select name="class_id" id="class_id" class="form-select" required>
                            <option value="">Select Class</option>
                            <?php foreach ($assignments as $assignment): ?>
                                <option value="<?= $assignment->class_id ?>_<?= $assignment->section ?>_<?= $assignment->subject_name ?>">
                                    <?= $assignment->class_name ?> - <?= $assignment->section ?> - <?= $assignment->subject_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="attendance_date" class="form-label">Attendance Date</label>
                        <input type="date" name="attendance_date" id="attendance_date" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Load Students</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<!-- Footer Load -->
<?php $this->load->view('teacher/include/footer'); ?>

