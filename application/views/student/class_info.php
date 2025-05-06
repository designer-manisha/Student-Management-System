<?php $this->load->view('student/include/header.php'); ?>
<?php $this->load->view('student/include/sidebar.php'); ?>

<!-- Main Content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    <div class="container mt-5">

        <?php if ($class_info): ?>
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h4 class="mb-0">Class Information</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Class</th>
                            <td><?= $class_info->class_name; ?></td>
                        </tr>
                        <tr>
                            <th>Section</th>
                            <td><?= $class_info->section; ?></td>
                        </tr>
                        <tr>
                            <th>Class Teacher</th>
                            <td><?= $class_info->class_teacher_id; ?></td>
                        </tr>
                    </table>

                    <!-- Subjects List -->
                    <h5 class="mt-4">Assigned Subjects:</h5>
                    <ul class="list-group">
                        <?php if (!empty($subjects)): ?>
                            <?php foreach ($subjects as $subject): ?>
                                <li class="list-group-item"><?= $subject->subject_name ?> 
                                    <span class="badge bg-success"><?= $subject->teacher_name ?></span>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="list-group-item text-muted">No subjects assigned.</li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Card Footer (Back button or other actions) -->
                <div class="card-footer text-end bg-white border-0">
                    <a href="<?= base_url('StudentDashboard/student_dashboard') ?>" class="btn btn-secondary">
                        ⬅ Back to Dashboard
                    </a>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning mt-4">
                No class information found.
            </div>
        <?php endif; ?>
    </div>
</main>
