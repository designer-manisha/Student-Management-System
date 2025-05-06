<?php $this->load->view('admin/include/header'); ?>

<div class="container-fluid" id="content">
    <div class="row">
        <div class="col-md-2">
            <?php $this->load->view('admin/include/sidebar'); ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 mt-4">
            <div class="card shadow">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-white">Edit Subject</h5>
                </div>

                <div class="card-body">
                    <form method="post">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label>Subject Name:</label>
                                <input type="text" name="subject_name" value="<?= $subject->subject_name ?>" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3 ">
                                <label>Select Class:</label>
                                <select name="class_id" class="form-control" required>
                                    <option value="">-- Select Class --</option>
                                    <?php foreach ($classes as $class): ?>
                                        <option value="<?= $class->id ?>" <?= $class->id == $subject->class_id ? 'selected' : '' ?>>
                                            <?= $class->class_name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success">Update Subject</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/include/footer'); ?>