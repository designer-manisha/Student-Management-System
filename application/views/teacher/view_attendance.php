<!-- Header Load -->
<?php $this->load->view('teacher/include/header'); ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Load -->
        <?php $this->load->view('teacher/include/sidebar'); ?>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-9 px-md-4 py-4">
            <div class="card shadow rounded p-4">
                <!-- Success and Error Messages -->
                <div class="alert-messages">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
                    <?php endif; ?>
                </div>

                <!-- Page Heading -->
                <h2 class="mb-4">My Attendance Records</h2>

                <!-- Table for Attendance Records -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($attendances as $a): ?>
                        <tr>
                            <td><?= $a->name ?></td>
                            <td><?= $a->class_name ?></td>
                            <td><?= $a->subject ?></td>
                            <td><?= $a->attendance_date ?></td>
                            <td><?= $a->status ?></td>
                            <td>
                                <a href="<?= base_url('TeacherDashboard/edit_attendance/'.$a->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('TeacherDashboard/delete_attendance/'.$a->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<!-- Footer Load -->
<?php $this->load->view('teacher/include/footer'); ?>
