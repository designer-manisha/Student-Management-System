<?php $this->load->view('student/include/header.php'); ?>
<?php $this->load->view('student/include/sidebar.php'); ?>

<!-- Main Content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-success text-white text-center rounded-top-4">
                <h4 class="mb-0">📋 My Appointments</h4>
            </div>

            <div class="card-body">
                <?php if (!empty($appointments)): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="table-success">
                                <tr>
                                    <th>👨‍🏫 Teacher</th>
                                    <th>📅 Date</th>
                                    <th>📝 Reason</th>
                                    <th>✅ Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($appointments as $a): ?>
                                    <tr>
                                        <td><?= $a->teacher_name ?></td>
                                        <td><?= date('d M Y', strtotime($a->appointment_date)) ?></td>
                                        <td><?= $a->reason ?></td>
                                        <td>
                                            <?php
                                                if ($a->status == 'Pending') {
                                                    echo '<span class="badge bg-warning text-dark">Pending</span>';
                                                } elseif ($a->status == 'Approved') {
                                                    echo '<span class="badge bg-success">Approved</span>';
                                                } elseif ($a->status == 'Rejected') {
                                                    echo '<span class="badge bg-danger">Rejected</span>';
                                                } else {
                                                    echo '<span class="badge bg-secondary">Unknown</span>';
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning text-center" role="alert">
                        No appointment records found.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
