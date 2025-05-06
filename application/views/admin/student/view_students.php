<?php $this->load->view('admin/include/header'); ?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="container-fluid" id="content">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-2 col-md-3 col-sm-12 mb-3">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <!-- Main Content -->
        <div class="col-lg-10 col-md-9 col-sm-12">
            <div class="card shadow mt-3">
                <div class="card-header text-white d-flex flex-wrap justify-content-between align-items-center" style="background-color: #1A4870;">
                    <a href="<?= site_url('admin/dashboard'); ?>" class="btn btn-light btn-sm mb-2">Back</a>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="<?= site_url('student/download_all_pdf'); ?>" class="btn btn-light btn-sm">
                            <i class="bi bi-download"></i> Download All PDF
                        </a>

                        <a href="<?= site_url('student/download_all_student_excel'); ?>" class="btn btn-light btn-sm">
                            <i class="bi bi-download"></i> Download All Excel
                        </a>

                        <a href="<?= site_url('student/add'); ?>" class="btn btn-light btn-sm">
                            + Add Student
                        </a>
                    </div>
                </div>

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
                                    <th>DOB</th>
                                    <th>Class</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($students as $student): ?>
                                    <tr>
                                        <td><?= $student->id; ?></td>
                                        <td><?= $student->name; ?></td>
                                        <td><?= $student->email; ?></td>
                                        <td><?= $student->phone; ?></td>
                                        <td><?= $student->gender; ?></td>
                                        <td><?= $student->dob; ?></td>
                                        <td><?= $student->class_name . ' - ' . $student->section; ?></td>
                                        <td class="text-nowrap">
                                            <a href="<?= site_url('student/edit/' . $student->id); ?>" class="btn btn-warning btn-sm mb-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <a href="<?= site_url('student/delete/' . $student->id); ?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Are you sure to delete this record?')">
                                                <i class="bi bi-trash3"></i> Delete
                                            </a>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm text-white" style="background-color: #804674;" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Download
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="<?= site_url('student/generate_pdf/' . $student->id); ?>">PDF Download</a></li>
                                                    <li><a class="dropdown-item" href="<?= site_url('student/download_excel/' . $student->id); ?>">Excel Download</a></li>
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

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<?php $this->load->view('admin/include/footer'); ?>
