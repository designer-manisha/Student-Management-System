<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid" id="content">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 mt-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex flex-wrap justify-content-between align-items-center">
                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm mb-2 mb-md-0">Back</a>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="<?= site_url('teacher/download_all_pdf'); ?>" class="btn btn-light btn-sm">
                            <i class="bi bi-download"></i> Download All PDF
                        </a>

                        <a href="<?= site_url('teacher/download_all_teacher_excel'); ?>" class="btn btn-light btn-sm">
                            <i class="bi bi-download"></i> Download All Excel
                        </a>

                        <a href="<?= site_url('teacher/add'); ?>" class="btn btn-light btn-sm">
                            + Add Teacher
                        </a>
                    </div>
                </div>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Gender</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($teachers as $teacher): ?>
                                    <tr>
                                        <td><?php echo $teacher->id; ?></td>
                                        <td><?php echo $teacher->name; ?></td>
                                        <td><?php echo $teacher->email; ?></td>
                                        <td><?php echo $teacher->phone; ?></td>
                                        <td><?php echo $teacher->gender; ?></td>
                                        <td><?php echo $teacher->subject; ?></td>
                                        <td><?php echo $teacher->joining_date; ?></td>
                                        <td class="text-nowrap">
                                            <a href="<?php echo site_url('teacher/edit/' . $teacher->id); ?>" class="btn btn-warning btn-sm me-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a> |
                                            <a href="<?php echo site_url('teacher/delete/' . $teacher->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this record?')">
                                                <i class="bi bi-trash3"></i> Delete
                                            </a> |

                                            <div class="dropdown d-inline-block">
                                                <button type="button" class="btn btn-sm dropdown-toggle" style="background-color: #804674;" data-bs-toggle="dropdown">
                                                    Download
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="<?= site_url('teacher/generate_pdf/' . $teacher->id); ?>" class="dropdown-item">
                                                            PDF Download
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="<?= site_url('teacher/download_excel/' . $teacher->id); ?>">
                                                            Excel Download
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
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
</div><br>

<style>
@media (max-width: 768px) {
    .card-header .btn {
        margin-bottom: 5px;
    }
    
    .table td {
        white-space: nowrap;
    }
}

.table > :not(caption) > * > * {
    padding: 0.75rem;
}
</style>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        "responsive": true,
        "autoWidth": false,
        "scrollX": true
    });
});
</script>

<?php $this->load->view('admin/include/footer'); ?> 