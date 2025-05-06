<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

<div class="container-fluid col-md-11" id="content">
    <div class="row">
        <div class="col-md-2">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <div class="col-md-10 mt-3">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justyfy-content-between align-items-center">
                    <a href="<?= base_url('admin/dashboard'); ?>" class="btn btn-light btn-sm">Back</a>

                    <a href="<?= base_url('classes/add'); ?>" class="btn btn-light btn-sm">+ Add Class</a>
                </div>

                <div class="card-body">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Class Name</th>
                                    <th>Section</th>
                                    <th>Class Teacher</th>
                                    <th>Actions</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php foreach ($classes as $class): ?>
                                    <tr>
                                        <td><?= $class->id ?></td>
                                        <td><?= $class->class_name ?></td>
                                        <td><?= $class->section ?></td>
                                        <td><?= $class->teacher_name ?></td>
                                        <td>
                                            <a href="<?= base_url('classes/edit/' . $class->id) ?>" class="btn btn-primary btn-sm">Edit</a> |       
                                            <a href="<?= base_url('classes/delete/' . $class->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this class?')">Delete </a>
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
    $(document).ready(function(){
        $('#example').DataTable();
    })
</script>

<?php $this->load->view('admin/include/footer'); ?>
