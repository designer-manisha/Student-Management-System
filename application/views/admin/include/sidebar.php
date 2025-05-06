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
                <a href="<?php echo site_url('admin/dashboard'); ?>" class="sidebar_link <?php echo ($current == 'admin/dashboard') ? 'active' : ''; ?>" style="color: #fff;">
                    <span class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 5V7H15V5H19ZM9 5V11H5V5H9ZM19 13V19H15V13H19ZM9 17V19H5V17H9ZM21 3H13V9H21V3ZM11 3H3V13H11V3ZM21 11H13V21H21V11ZM11 15H3V21H11V15Z"
                                fill="#797979" />
                        </svg>
                    </span>
                    Home
                </a>
            </div>

            <!-- Students Dropdown -->
            <div class="sidebar_item">
                <a href="#studentSubmenu" data-toggle="collapse" class="sidebar_link" style="color: #fff;">
                    <!-- <a href="#studentSubmenu" data-toggle="collapse" class="sidebar_link <?php //echo $studentOpen ? 'active' : ''; 
                                                                                                ?>"> -->
                    <span class="icon">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                            <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                            <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
                        </svg>
                    </span>
                    Students
                    <span class="ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>
                <?php $studentOpen = ($current == 'student/add' || $current == 'student/view') ? 'show' : ''; ?>
                <div class="collapse <?php echo $studentOpen; ?>" id="studentSubmenu">

                    <div class="ps-4 ">
                        <a href="<?php echo site_url('student/add'); ?>" class="sidebar_link <?php echo ($current == 'student/add') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-plus"></i> Add Student
                        </a>
                        <a href="<?php echo site_url('student/view'); ?>" class="sidebar_link <?php echo ($current == 'student/view') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-view-list"></i> View Students
                        </a>
                    </div>
                </div>
            </div>

            <!-- Teachers Dropdown -->
            <div class="sidebar_item">
                <a href="#teacherSubmenu" data-toggle="collapse" class="sidebar_link" style="color: #fff;">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
                        </svg>
                    </span>
                    Teachers
                    <span class="ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>

                <?php $teacherOpen = ($current == 'teacher/add' || $current == 'teacher/view') ? 'show' : ''; ?>

                <div class="collapse <?php echo $teacherOpen; ?>" id="teacherSubmenu">
                    <div class="ps-4">
                        <a href="<?php echo site_url('teacher/add'); ?>" class="sidebar_link <?php echo ($current == 'teacher/add') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-plus"></i> Add Teacher
                        </a>
                        <a href="<?php echo site_url('teacher/view'); ?>" class="sidebar_link <?php echo ($current == 'teacher/view') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-view-list"></i> View Teachers
                        </a>
                    </div>
                </div>
            </div>

            <!-- Parents Dropdown -->
            <div class="sidebar_item">
                <a href="#parentSubmenu" data-toggle="collapse" class="sidebar_link" style="color: #fff;">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        </svg>
                    </span>
                    Parents
                    <span class="ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>

                <?php $parentOpen = ($current == 'parents/add' || $current == 'parents/view') ? 'show' : ''; ?>
                <div class="collapse <?php echo $parentOpen; ?>" id="parentSubmenu">
                    <div class="ps-4">
                        <a href="<?php echo site_url('parents/add'); ?>" class="sidebar_link <?php echo ($current == 'parents/add') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-plus"></i> Add Parent
                        </a>
                        <a href="<?php echo site_url('parents/view'); ?>" class="sidebar_link <?php echo ($current == 'parents/view') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-view-list"></i> View Parents
                        </a>
                    </div>
                </div>
            </div>

            <!-- Class Dropdown -->

            <div class="sidebar_item">
                <a href="#classSubmenu" data-toggle="collapse" class="sidebar_link" style="color: #fff;">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                        </svg>
                    </span>
                    Class
                    <span class="ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>

                <?php $classOpen = ($current == 'classes/add' || $current == 'classes/view' || $current == 'ManageClassController/manage' || $current == 'ManageClassController/filter') ? 'show' : ''; ?>
                <div class="collapse <?php echo $classOpen; ?>" id="classSubmenu">
                    <div class="ps-4">
                        <a href="<?php echo site_url('classes/add'); ?>" class="sidebar_link <?php echo ($current == 'classes/add') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-plus"></i> Add Class
                        </a>
                        <a href="<?php echo site_url('classes/view'); ?>" class="sidebar_link <?php echo ($current == 'classes/view') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-view-list"></i> View Class
                        </a>

                        <a href="<?php echo site_url('ManageClassController/manage'); ?>" class="sidebar_link <?php echo ($current == 'ManageClassController/manage' || $current == 'ManageClassController/filter') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-gear"></i> Manage Class
                        </a>

                        <!-- <a href="<?php //echo site_url('ManageClassController/manage'); ?>" class="sidebar_link <?php //echo ($current == 'ManageClassController/manage') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-gear"></i> Manage Class
                        </a> -->

                    </div>
                </div>

            </div>

            <!-- Subject Dropdowns -->

            <div class="sidebar_item">
                <a href="#subjectSubmenu" data-toggle="collapse" class="sidebar_link" style="color: #fff;">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
                            <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                        </svg>
                    </span>
                    Subject
                    <span class="ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>

                <?php $subjectOpen = ($current == 'SubjectController/add' || $current == 'SubjectController/list') ? 'show' : ''; ?>
                <div class="collapse <?php echo $subjectOpen; ?>" id="subjectSubmenu">
                    <div class="ps-4">
                        <a href="<?php echo site_url('SubjectController/add'); ?>" class="sidebar_link <?php echo ($current == 'SubjectController/add') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-plus"></i> Add Subject
                        </a>
                        <a href="<?php echo site_url('SubjectController/list'); ?>" class="sidebar_link <?php echo ($current == 'SubjectController/list') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-view-list"></i> View Subject
                        </a>

                    </div>
                </div>

            </div>

            <div class="sidebar_item">
                <a href="#assignmentSubmenu" data-toggle="collapse" class="sidebar_link" style="color: #fff;">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
                            <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                        </svg>
                    </span>
                    Assign Subject
                    <span class="ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>

                <?php $assignmentOpen = ($current == 'AssignSubjectController/index' || $current == 'AssignSubjectController/view_assignments' || $current == 'AssignSubjectController/classWiseSubjects' || $current == 'AssignSubjectController/filterByTeacher') ? 'show' : ''; ?>
                <div class="collapse <?php echo $assignmentOpen; ?>" id="assignmentSubmenu">
                    <div class="ps-4">
                        <a href="<?php echo site_url('AssignSubjectController/index'); ?>" class="sidebar_link <?php echo ($current == 'AssignSubjectController/index') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-plus"></i> Assign Subject
                        </a>
                        <a href="<?php echo site_url('AssignSubjectController/view_assignments'); ?>" class="sidebar_link <?php echo ($current == 'AssignSubjectController/view_assignments') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-view-list"></i> View Subject Details
                        </a>
                        <a href="<?php echo site_url('AssignSubjectController/classWiseSubjects'); ?>" class="sidebar_link <?php echo ($current == 'AssignSubjectController/classWiseSubjects') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-view-list"></i> View Class Details
                        </a>
                        <a href="<?php echo site_url('AssignSubjectController/filterByTeacher'); ?>" class="sidebar_link <?php echo ($current == 'AssignSubjectController/filterByTeacher') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-view-list"></i> Filter By Teacher
                        </a>

                    </div>
                </div>

            </div>


            <div class="sidebar_item">
                <a href="<?php echo site_url('admin/view_attendance'); ?>" class="sidebar_link <?php echo ($current == 'admin/view_attendance') ? 'active' : ''; ?>" style="color: #fff;">
                    <span class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 5V7H15V5H19ZM9 5V11H5V5H9ZM19 13V19H15V13H19ZM9 17V19H5V17H9ZM21 3H13V9H21V3ZM11 3H3V13H11V3ZM21 11H13V21H21V11ZM11 15H3V21H11V15Z"
                                fill="#797979" />
                        </svg>
                    </span>
                    Attendance
                </a>
            </div>

            <div class="sidebar_item">
                <a href="#noticeSubmenu" data-toggle="collapse" class="sidebar_link" style="color: #fff;">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        </svg>
                    </span>
                    Notice
                    <span class="ms-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </a>

                <?php $noticeOpen = ($current == 'admin/add_notice' || $current == 'Admin/view_notices') ? 'show' : ''; ?>
                <div class="collapse <?php echo $noticeOpen; ?>" id="noticeSubmenu">
                    <div class="ps-4">
                        <a href="<?php echo site_url('admin/add_notice'); ?>" class="sidebar_link <?php echo ($current == 'admin/add_notice') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-plus"></i> Add Notice
                        </a>
                        <a href="<?php echo site_url('Admin/view_notices'); ?>" class="sidebar_link <?php echo ($current == 'Admin/view_notices') ? 'active' : ''; ?>" style="color: #fff;">
                            <i class="bi bi-view-list"></i> View Notice
                        </a>
                    </div>
                </div>
            </div>


</br></br></br></br>
        </div>
    </div>
</div>