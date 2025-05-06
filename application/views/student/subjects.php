<?php $this->load->view('student/include/header.php'); ?>
<?php $this->load->view('student/include/sidebar.php'); ?>

<!-- Main Content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center rounded-top-4">
                <h4 class="mb-0">🔍 Search Subject Details</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-4">
                        <label for="subject_id" class="form-label fw-bold">Select Subject</label>
                        <select name="subject_id" id="subject_id" class="form-select form-control" required>
                            <option value="">-- Select Subject --</option>
                            <?php foreach ($subjects as $subject): ?>
                                <option value="<?= $subject->id ?>" <?= isset($selected_subject) && $selected_subject->subject_name == $subject->subject_name ? 'selected' : '' ?>>
                                    <?= $subject->subject_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100">🔍 Search</button>
                </form>
            </div>
        </div>

        <?php if (isset($selected_subject)): ?>
            <div class="card mt-4 shadow border-0 rounded-4">
                <div class="card-header bg-success text-white text-center rounded-top-4">
                    <h5 class="mb-0">📘 Subject Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>Subject:</strong> <?= $selected_subject->subject_name; ?></p>
                    <p><strong>Teacher:</strong> <?= $selected_subject->teacher_name; ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>
