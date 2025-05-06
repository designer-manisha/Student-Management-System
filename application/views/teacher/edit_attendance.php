<!-- Header Load -->
<?php $this->load->view('teacher/include/header'); ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Load -->
        <?php $this->load->view('teacher/include/sidebar'); ?>

        <!-- Main Content Area -->
        <main class="col-md-9 col-lg-9 px-md-4 py-4">
            <div class="card shadow rounded p-4">
                <h2 class="mb-4">Edit Attendance</h2>

                <form method="post" action="<?= base_url('TeacherDashboard/update_attendance') ?>">
                    <input type="hidden" name="id" value="<?= $attendance->id ?>">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Student ID:</label>
                        <input type="text" class="form-control" value="<?= $attendance->student_id ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Subject:</label>
                        <input type="text" class="form-control" value="<?= $attendance->subject ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Date:</label>
                        <input type="text" class="form-control" value="<?= $attendance->attendance_date ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Status:</label>
                        <select name="status" class="form-select">
                            <option value="Present" <?= ($attendance->status == 'Present') ? 'selected' : '' ?>>Present</option>
                            <option value="Absent" <?= ($attendance->status == 'Absent') ? 'selected' : '' ?>>Absent</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Attendance</button>
                </form>
            </div>
        </main>
    </div>
</div>

<!-- Footer Load -->
<?php $this->load->view('teacher/include/footer'); ?>
