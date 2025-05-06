<?php $this->load->view('teacher/include/header'); ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 p-0">
            <?php $this->load->view('teacher/include/sidebar'); ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center">
                    <i class="bi bi-book-fill fs-3 me-3 text-primary"></i>
                    <h4 class="mb-0">My Subjects</h4>
                </div>
            </div>

            <div class="row g-4">
                <?php foreach ($subjects as $subject): ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-header bg-primary text-white py-3">
                                <h5 class="mb-0">
                                    <i class="bi bi-book me-2"></i>
                                    <?= $subject->subject_name ?>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-mortarboard-fill text-primary me-2"></i>
                                    <span>Class: <?= $subject->class_name ?></span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-people-fill text-primary me-2"></i>
                                    <span>Section: <?= $subject->section ?></span>
                                </div>
                                <div class="d-grid">
                                    <a href="<?= base_url('TeacherDashboard/my_students/'.$subject->class_id.'/'.$subject->section) ?>" 
                                       class="btn btn-outline-primary">
                                        <i class="bi bi-person-lines-fill me-2"></i>View Students
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('teacher/include/footer'); ?>

<!-- <h2>My Subjects</h2>
<table border="1">
    <thead>
        <tr>
            <th>Subject</th>
            <th>Class</th>
            <th>Section</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($subjects as $subject): ?>
            <tr>
                <td><?= $subject->subject_name; ?></td>
                <td><?= $subject->class_name; ?></td>
                <td><?= $subject->section; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table> -->


