<!-- Footer -->
<footer class="footer mt-auto py-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <p class="mb-0 text-muted">
                    <i class="bi bi-c-circle"></i> <?= date('Y') ?> Teacher Portal. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-end">
                <p class="mb-0 text-muted">
                    Designed with <i class="bi bi-heart-fill text-danger"></i> by School Management System
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
.footer {
    background: linear-gradient(135deg, rgb(44, 16, 56) 0%, rgb(17, 78, 119) 100%);
    color: #fff;
    padding: 1rem 0;
    position: relative;
    bottom: 0;
    width: 100%;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
}
.footer p {
    font-size: 0.9rem;
    margin: 0;
}
.footer .text-muted {
    color: rgba(255,255,255,0.7) !important;
}
.footer .bi {
    vertical-align: middle;
}
.footer .bi-heart-fill {
    animation: heartbeat 1.5s ease-in-out infinite;
}
@keyframes heartbeat {
    0% { transform: scale(1); }
    50% { transform: scale(1.2); }
    100% { transform: scale(1); }
}
</style>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 