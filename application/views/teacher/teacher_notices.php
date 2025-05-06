<!-- Header Load -->
<?php $this->load->view('teacher/include/header'); ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Load -->
        <?php $this->load->view('teacher/include/sidebar'); ?>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-9 px-md-4 py-5">
            <div class="card shadow rounded p-4">
                <h3 class="mb-4">Notices for Teacher</h3>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($notices as $n): ?>
                                <tr>
                                    <td><?= $n->title ?></td>
                                    <td><?= $n->message ?></td>
                                    <td><?= $n->notice_date ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Footer Load -->
<?php $this->load->view('teacher/include/footer'); ?>
