<!-- Header Load -->
<?php $this->load->view('teacher/include/header'); ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Load -->
        <?php $this->load->view('teacher/include/sidebar'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-9 px-md-4 py-4">
            <div class="card shadow rounded p-4">
                <div class="alert-messages">
                    <!-- Success Message -->
                    <?php if ($this->session->flashdata('success')): ?>
                        <p class="alert alert-success"><?= $this->session->flashdata('success') ?></p>
                    <?php endif; ?>

                    <!-- Error Message -->
                    <?php if ($this->session->flashdata('error')): ?>
                        <p class="alert alert-danger"><?= $this->session->flashdata('error') ?></p>
                    <?php endif; ?>
                </div>

                <h3>Mark Attendance for <?= $subject_name ?> - on <?= $attendance_date ?></h3>

                <form method="post" action="<?= base_url('TeacherDashboard/save_attendance') ?>" class="mt-4">
                    <input type="hidden" name="class_id" value="<?= $class_id ?>">
                    <input type="hidden" name="subject_name" value="<?= $subject_name ?>">
                    <input type="hidden" name="attendance_date" value="<?= $attendance_date ?>">

                    <!-- Table for Attendance -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $s): ?>
                                <tr>
                                    <td><?= $s->name ?></td>
                                    <td>
                                        <select name="attendance[<?= $s->id ?>]" class="form-select">
                                            <option value="Present">Present</option>
                                            <option value="Absent">Absent</option>
                                        </select>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Save Attendance</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<!-- Footer Load -->
<?php $this->load->view('teacher/include/footer'); ?>
