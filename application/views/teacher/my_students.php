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
                    <i class="bi bi-people-fill fs-3 me-3 text-primary"></i>
                    <h4 class="mb-0">My Students</h4>
                </div>
                <div class="text-muted">
                <!-- Class: <?= $class_id ?> | Section: <?= $section ?> -->


                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <!-- <th>Roll No</th> -->
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <!-- <th>Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($students): ?>
                                    <?php foreach($students as $student): ?>
                                        <tr>
                                            <!-- <td><?= $student->roll_no ?></td> -->
                                            <td><?= $student->name ?></td>
                                            <td><?= $student->email ?></td>
                                            <td><?= $student->phone ?></td>
                                            <td><?= $student->gender ?></td>
                                            <!-- <td>
                                                <a href="<?= base_url('TeacherDashboard/view_student/'.$student->id) ?>" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i> View
                                                </a>
                                            </td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No students found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('teacher/include/footer'); ?>


