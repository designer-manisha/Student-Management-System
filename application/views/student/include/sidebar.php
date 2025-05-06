<?php
$current = $this->uri->uri_string();
?>

<!-- Sidebar starts -->
<div id="sidebar" style="width: 250px; margin-top: 70px; position: fixed; height: 100vh; background-color: #1A4870; ">
    <div class="sidebar_wrapper" style="overflow: auto;">
        <div class="sidebar-header text-center py-4">
            <img src="<?php echo base_url('assets/SMS_logo.png');

                        ?>" alt="School Logo" class="sidebar_logo" style="width: 70px; height: 50px; border-radius: 50%; margin-bottom: 10px; margin-left: -150px;">

            <h5 class="sidebar_title" style="margin-top: -60px; color: #fff;">Admin</h5>
            <h6 class="sidebar_title text-warning mb-0 small font-weight-bold" style="margin-top: -15px; margin-left:0px;">Active</h6>

        </div>

        <div class="sidebar_list">
            <!-- Dashboard -->
            <div class="sidebar_item">
                <a href="<?php echo site_url('StudentDashboard/my_profile'); ?>" class="sidebar_link <?php echo ($current == 'StudentDashboard/my_profile') ? 'active' : ''; ?>" style="color: #fff;">
                    <span class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 5V7H15V5H19ZM9 5V11H5V5H9ZM19 13V19H15V13H19ZM9 17V19H5V17H9ZM21 3H13V9H21V3ZM11 3H3V13H11V3ZM21 11H13V21H21V11ZM11 15H3V21H11V15Z"
                                fill="#797979" />
                        </svg>
                    </span>
                    My Profile
                </a>
            </div>

            <div class="sidebar_item">
                <a href="<?php echo site_url('StudentDashboard/my_class'); ?>" class="sidebar_link <?php echo ($current == 'StudentDashboard/my_class') ? 'active' : ''; ?>" style="color: #fff;">
                    <span class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 5V7H15V5H19ZM9 5V11H5V5H9ZM19 13V19H15V13H19ZM9 17V19H5V17H9ZM21 3H13V9H21V3ZM11 3H3V13H11V3ZM21 11H13V21H21V11ZM11 15H3V21H11V15Z"
                                fill="#797979" />
                        </svg>
                    </span>
                    My Class
                </a>
            </div>

            <div class="sidebar_item">
                <a href="<?php echo site_url('StudentDashboard/subjects'); ?>" class="sidebar_link <?php echo ($current == 'StudentDashboard/subjects') ? 'active' : ''; ?>" style="color: #fff;">
                    <span class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 5V7H15V5H19ZM9 5V11H5V5H9ZM19 13V19H15V13H19ZM9 17V19H5V17H9ZM21 3H13V9H21V3ZM11 3H3V13H11V3ZM21 11H13V21H21V11ZM11 15H3V21H11V15Z"
                                fill="#797979" />
                        </svg>
                    </span>
                    Subjects
                </a>
            </div> 

            <div class="sidebar_item">
                <a href="<?php echo site_url('StudentDashboard/view_attendance'); ?>" class="sidebar_link <?php echo ($current == 'StudentDashboard/view_attendance') ? 'active' : ''; ?>" style="color: #fff;">
                    <span class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 5V7H15V5H19ZM9 5V11H5V5H9ZM19 13V19H15V13H19ZM9 17V19H5V17H9ZM21 3H13V9H21V3ZM11 3H3V13H11V3ZM21 11H13V21H21V11ZM11 15H3V21H11V15Z"
                                fill="#797979" />
                        </svg>
                    </span>
                    View Attendance
                </a>
            </div> 

            <div class="sidebar_item">
                <a href="<?php echo site_url('StudentDashboard/notices'); ?>" class="sidebar_link <?php echo ($current == 'StudentDashboard/notices') ? 'active' : ''; ?>" style="color: #fff;">
                    <span class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 5V7H15V5H19ZM9 5V11H5V5H9ZM19 13V19H15V13H19ZM9 17V19H5V17H9ZM21 3H13V9H21V3ZM11 3H3V13H11V3ZM21 11H13V21H21V11ZM11 15H3V21H11V15Z"
                                fill="#797979" />
                        </svg>
                    </span>
                    Notices
                </a>
            </div>

            <div class="sidebar_item">
                <a href="<?php echo site_url('StudentDashboard/request_appointment'); ?>" class="sidebar_link <?php echo ($current == 'StudentDashboard/request_appointment') ? 'active' : ''; ?>" style="color: #fff;">
                    <span class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 5V7H15V5H19ZM9 5V11H5V5H9ZM19 13V19H15V13H19ZM9 17V19H5V17H9ZM21 3H13V9H21V3ZM11 3H3V13H11V3ZM21 11H13V21H21V11ZM11 15H3V21H11V15Z"
                                fill="#797979" />
                        </svg>
                    </span>
                    appointments
                </a>
            </div>

            <div class="sidebar_item">
                <a href="<?php echo site_url('StudentDashboard/view_appointments'); ?>" class="sidebar_link <?php echo ($current == 'StudentDashboard/view_appointments') ? 'active' : ''; ?>" style="color: #fff;">
                    <span class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 5V7H15V5H19ZM9 5V11H5V5H9ZM19 13V19H15V13H19ZM9 17V19H5V17H9ZM21 3H13V9H21V3ZM11 3H3V13H11V3ZM21 11H13V21H21V11ZM11 15H3V21H11V15Z"
                                fill="#797979" />
                        </svg>
                    </span>
                    view appointments
                </a>
            </div>

            <div class="sidebar_item">
                <a href="<?php echo site_url('StudentDashboard/logout'); ?>" class="sidebar_link <?php echo ($current == 'StudentDashboard/logout') ? 'active' : ''; ?>" style="color: #fff;">
                    <span class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 5V7H15V5H19ZM9 5V11H5V5H9ZM19 13V19H15V13H19ZM9 17V19H5V17H9ZM21 3H13V9H21V3ZM11 3H3V13H11V3ZM21 11H13V21H21V11ZM11 15H3V21H11V15Z"
                                fill="#797979" />
                        </svg>
                    </span>
                    logout
                </a>
            </div>
        </div>
    </div>
</div>