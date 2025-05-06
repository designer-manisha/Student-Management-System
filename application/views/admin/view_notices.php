<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid" id="content">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-dark min-vh-">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 mt-4">
            <div class="card shadow">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-light">All Notices</h5>
                    <div>
                        <a href="<?= site_url('admin/add_notice'); ?>" class="btn btn-success btn-sm me-2">
                            <i class="bi bi-plus-circle"></i> Add Notice
                        </a>
                        <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            <?= $this->session->flashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Audience</th>
                                    <th>Date</th>
                                    <th width="100">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($notices as $n): ?>
                                <tr>
                                    <td class="fw-bold"><?= $n->title ?></td>
                                    <td><?= $n->message ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-<?= $n->audience == 'All' ? 'primary' : ($n->audience == 'Teacher' ? 'success' : 'info') ?>">
                                            <?= $n->audience ?>
                                        </span>
                                    </td>
                                    <td class="text-center"><?= date('d M Y', strtotime($n->notice_date)) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('Admin/delete_notice/'.$n->id) ?>" 
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure you want to delete this notice?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
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
/* Sidebar Styles */
.bg-dark {
    background-color: #1A4870 !important;
}

/* Button Hover Effects */
.btn-dark:hover {
    background-color: #2c6aa0;
    border-color: #2c6aa0;
}

.btn-success:hover {
    background-color: #198754;
    border-color: #198754;
}

.btn-danger:hover {
    background-color: #dc3545;
    border-color: #dc3545;
}

/* Card Header */
.card-header {
    border-bottom: 2px solid #2c6aa0;
}

/* Table Styles */
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

/* Alert Styles */
.alert {
    border: none;
    border-radius: 0.5rem;
}

.alert-success {
    background-color: #d1e7dd;
    color: #0f5132;
}
</style>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        "responsive": true,
        "autoWidth": false,
        "scrollX": true,
        "order": [[3, "desc"]], // Sort by date column
        "language": {
            "search": "Search:",
            "lengthMenu": "Show _MENU_ entries per page",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries"
        }
    });
});
</script>

<?php $this->load->view('admin/include/footer'); ?>
