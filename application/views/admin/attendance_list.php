<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid" id="content">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-dark min-vh-100">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 mt-4">
            <div class="card shadow">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-light">Attendance Records</h5>
                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>

                <div class="card-body">
                    <!-- Filter Form -->
                    <form method="get" action="<?= base_url('Admin/view_attendance') ?>" class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label class="form-label">Class ID</label>
                            <input type="text" name="class_name" class="form-control" placeholder="e.g., 1">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" placeholder="e.g., Math">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-dark">
                                <i class="bi bi-search"></i> Filter
                            </button>
                        </div>
                    </form>

                    <!-- Attendance Table -->
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>Student Name</th>
                                    <th>Class ID</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Marked By</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($attendance_records as $record): ?>
                                <tr>
                                    <td><?= $record->name ?></td>
                                    <td><?= $record->class_name ?></td>
                                    <td><?= $record->subject ?></td>
                                    <td><?= $record->attendance_date ?></td>
                                    <td>
                                        <span class="badge bg-<?= $record->status == 'Present' ? 'success' : 'danger' ?>">
                                            <?= $record->status ?>
                                        </span>
                                    </td>
                                    <td><?= $record->teacher_name ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.form-label {
    font-weight: 500;
    color: #1A4870;
}

.table > :not(caption) > * > * {
    padding: 0.75rem;
}

.table tbody tr:hover {
    background-color: rgba(26, 72, 112, 0.05);
}

.badge {
    padding: 0.5em 1em;
    font-weight: 500;
}

/* Sidebar Styles */
.bg-dark {
    background-color: #1A4870 !important;
}

/* Button Hover Effects */
.btn-dark:hover {
    background-color: #2c6aa0;
    border-color: #2c6aa0;
}

/* Card Header */
.card-header {
    border-bottom: 2px solid #2c6aa0;
}
</style>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        "responsive": true,
        "autoWidth": false,
        "scrollX": true,
        "language": {
            "search": "Search:",
            "lengthMenu": "Show _MENU_ entries per page",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries"
        }
    });
});
</script>

<?php $this->load->view('admin/include/footer'); ?>
