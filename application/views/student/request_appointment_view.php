<?php $this->load->view('student/include/header.php'); ?>
<?php $this->load->view('student/include/sidebar.php'); ?>

<!-- Main Content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-info text-white text-center rounded-top-4">
                <h4 class="mb-0">📅 Request Appointment</h4>
            </div>

            <div class="card-body p-4">
                <form method="post" action="<?= base_url('StudentDashboard/save_appointment') ?>">
                    <div class="mb-3">
                        <label for="teacher_id" class="form-label">👩‍🏫 Select Teacher</label>
                        <select name="teacher_id" id="teacher_id" class="form-select form-control" required>
                            <option value="" disabled selected>Select a teacher</option>
                            <?php foreach ($teachers as $t): ?>
                                <option value="<?= $t->id ?>"><?= $t->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="appointment_date" class="form-label">📆 Preferred Date</label>
                        <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="reason" class="form-label">✍️ Reason</label>
                        <textarea name="reason" id="reason" class="form-control" rows="4" placeholder="Enter your reason..." required></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-info text-white fw-bold">
                            📤 Send Request
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
