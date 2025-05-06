<?php $this->load->view('student/include/header.php'); ?>
<?php $this->load->view('student/include/sidebar.php'); ?>

<!-- Main Content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-warning text-dark text-center rounded-top-4">
                <h4 class="mb-0">📢 Notices for Students</h4>
            </div>

            <div class="card-body">
                <?php if (!empty($notices)): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>📌 Title</th>
                                    <th>📝 Message</th>
                                    <th>📅 Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($notices as $n): ?>
                                    <tr>
                                        <td><?= $n->title ?></td>
                                        <td><?= $n->message ?></td>
                                        <td><?= date('d M Y', strtotime($n->notice_date)) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-center text-muted">No notices available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
