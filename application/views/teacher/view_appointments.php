<!-- Header Load -->
<?php $this->load->view('teacher/include/header'); ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Load -->
        <?php $this->load->view('teacher/include/sidebar'); ?>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-9 px-md-4 py-4">
            <div class="card shadow rounded p-4">
                <h3 class="mb-4">Appointment Requests</h3>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Student</th>
                                <th>Date</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($appointments as $a): ?>
                                <tr>
                                    <td><?= $a->student_name ?></td>
                                    <td><?= $a->appointment_date ?></td>
                                    <td><?= $a->reason ?></td>
                                    <td><?= $a->status ?></td>
                                    <td>
                                        <?php if ($a->status == 'Pending'): ?>
                                            <a href="<?= base_url('TeacherDashboard/update_appointment_status/'.$a->id.'/Accepted') ?>" class="btn btn-success btn-sm me-2">Accept</a>
                                            <a href="<?= base_url('TeacherDashboard/update_appointment_status/'.$a->id.'/Rejected') ?>" class="btn btn-danger btn-sm">Reject</a>
                                        <?php else: ?>
                                            <span class="badge bg-secondary"><?= $a->status ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Footer Load -->
<?php $this->load->view('teacher/include/footer'); ?>
