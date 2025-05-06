<?php $this->load->view('student/include/header.php'); ?>
<?php $this->load->view('student/include/sidebar.php'); ?>

<!-- Main Content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-warning text-dark text-center rounded-top-4">
                <h4 class="mb-0">📋 My Attendance Records</h4>
            </div>

            <div class="card-body">
             
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Subject</th>
                                    <th>Class</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Marked By</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($attendance_records)): ?>
                                <?php foreach ($attendance_records as $record): ?>
                                    <tr>
                                        <td><?= $record->subject ?></td>
                                        <td><?= $record->class_name ?></td>
                                        <td><?= date("d-m-Y", strtotime($record->attendance_date)) ?></td>
                                        <td>
                                            <?php if ($record->status == 'Present'): ?>
                                                <span class="badge bg-success">Present</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Absent</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $record->marked_by ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">No attendance records found.</td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                
            </div>
        </div>
    </div>
</main>


