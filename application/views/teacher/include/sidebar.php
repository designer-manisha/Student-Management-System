<div class="sidebar min-vh- p-3">
    <h4 class="text-white text-center py-3 border-bottom border-secondary">Teacher Panel</h4>
    <div class="nav flex-column">
        <a href="<?= base_url('TeacherDashboard/index') ?>" class="nav-link text-white mb-2 rounded">
            <i class="bi bi-speedometer2 me-2"></i>Dashboard
        </a>
        <a href="<?= base_url('TeacherDashboard/profile') ?>" class="nav-link text-white mb-2 rounded">
            <i class="bi bi-person me-2"></i>My Profile
        </a>
        <a href="<?= base_url('TeacherDashboard/my_subjects') ?>" class="nav-link text-white mb-2 rounded">
            <i class="bi bi-book me-2"></i>My Subjects
        </a>
        <a href="<?= base_url('TeacherDashboard/my_student') ?>" class="nav-link text-white mb-2 rounded">
            <i class="bi bi-mortarboard-fill me-2"></i>My Students
        </a>
        <a href="<?= base_url('TeacherDashboard/attendance_form') ?>" class="nav-link text-white mb-2 rounded">
            <i class="bi bi-calendar-plus me-2"></i>Attendance
        </a>
        <a href="<?= base_url('TeacherDashboard/view_attendance') ?>" class="nav-link text-white mb-2 rounded">
            <i class="bi bi-calendar-check me-2"></i>View Attendance
        </a>
        <a href="<?= base_url('TeacherDashboard/notices') ?>" class="nav-link text-white mb-2 rounded">
            <i class="bi bi-bell me-2"></i>Notice Board
        </a>
        <a href="<?= base_url('TeacherDashboard/view_appointments') ?>" class="nav-link text-white mb-2 rounded">
            <i class="bi bi-calendar-event me-2"></i>Appointments
        </a>
        <a href="<?= base_url('TeacherDashboard/logout') ?>" class="nav-link text-white mb-2 rounded">
            <i class="bi bi-box-arrow-right me-2"></i>Logout
        </a>
    </div>
</div>

<style>
.sidebar {
    width: 250px;
    height: 84vh;
    background: linear-gradient(135deg,rgb(44, 16, 56) 0%,rgb(17, 78, 119) 100%);
    box-shadow: 2px 0 10px rgba(0,0,0,0.1);
}
.sidebar h4 {
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 1.2rem;
    margin-bottom: 1.5rem;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
}
.sidebar .nav-link {
    transition: all 0.3s ease;
    padding: 12px 15px;
    border-radius: 8px;
    margin-bottom: 5px;
    font-weight: 500;
    position: relative;
    overflow: hidden;
    background: rgba(255,255,255,0.05);
}
.sidebar .nav-link i {
    transition: all 0.3s ease;
    font-size: 1.1rem;
}
.sidebar .nav-link:hover {
    background: rgba(255,255,255,0.15);
    transform: translateX(5px);
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}
.sidebar .nav-link:hover i {
    transform: scale(1.2);
    color: #F1C40F;
}
.sidebar .nav-link.active {
    background: rgba(255,255,255,0.2);
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}
.sidebar .nav-link.active i {
    color: #F1C40F;
}
.sidebar .nav-link::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 3px;
    background: #F1C40F;
    transform: scaleY(0);
    transition: transform 0.3s ease;
}
.sidebar .nav-link:hover::before {
    transform: scaleY(1);
}
</style>

    