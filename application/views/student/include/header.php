<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="MQmKVX28PjIaYwZ3k6QA6vLhRUTSjqECkVFKxLx4">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
        rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://pharmavends.net/admin/assets/js/bootstrap-multiselect.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://pharmavends.net/admin/assets/js/swiper.min.js"></script>
    <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
    <script src="https://pharmavends.net/admin/assets/js/custom.js"></script>
    <link rel="stylesheet" href="https://pharmavends.net/admin/assets/css/style.css">
    <link rel="stylesheet" href="https://pharmavends.net/admin/assets/css/dashboard-style.css">
    <link rel="stylesheet" href="https://pharmavends.net/admin/assets/css/responsive.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <style>
        .profile_link.active {
            border: 2px solid red;
            border-radius: 50%;
            padding: 3px;
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1050;
            height: 70px;
        }


        .sidebar {
            position: fixed;
            top: 70px;
            left: 0;
            width: 250px;
            height: calc(100vh - 70px);
        }

        #content {
            /* margin-left: 250px; */
            margin-top: 100px;
            /* padding: 20px; */
        }

        .header-top h5 {
            font-weight: bold;
            font-size: 18px;
        }

        .toggle_sidebar img {
            width: 24px;
            height: 24px;
        }



    /* Fix Sidebar and Header */
body {
    display: flex;
    flex-direction: row;
    min-height: 100vh;
    margin: 0;
}

/* Sidebar */
#sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px; /* Sidebar width */
    height: 100vh;
    background-color: #343a40;
    color: white;
    padding-top: 50px;
    z-index: 1; /* Sidebar above content */
}

/* Content Area */
main {
    margin-left: 250px; /* Sidebar space */
    padding-top: 50px; /* Space for fixed header */
    flex: 1;
}

/* Header */
header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #007bff;
    color: white;
    padding: 15px 0;
    z-index: 10; /* Header above content and sidebar */
}

.card {
    margin-top: 80px; /* Adjust the top margin for content */
}

/* Adjust content for smaller screens */
@media (max-width: 768px) {
    #sidebar {
        position: relative;
        width: 100%;
        height: auto;
    }

    main {
        margin-left: 0;
    }

    header {
        position: relative;
    }
}


    </style>

</head>

<body class="dashboard d-flex flex-column min-vh-100">
    <!-- Header starts -->
    <header class=" bg- shadow-sm py-3 px-3 w-100" style="position: fixed; top: 0; left: 0; right: 0; z-index: 1050; background-color: #4158A6;">
        <div class="header-top d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
            <h5 class="mb-0 px-2" style="color: #fff;">Student Management</h5>

                <a href="javascript:void(0);" class="toggle_sidebar mr-3 px-5" style="color: #fff;">
                    <!-- <img src="https://pharmavends.net/admin/assets/images/icons/menu-icon-blue.png" alt=""> -->
                    <img src="https://pharmavends.net/admin/assets/images/icons/menu-icon-blue.png" alt="" style="filter: brightness(0) invert(1);">

                </a>
            </div>

            <?php
            $admin_email = isset($_SESSION['email']) ? $_SESSION['email'] : 'admin@gmail.com';
            ?>
            <div class="profile_Wrapper dropdown">
                <a href="#" class="profile_link dropdown-toggle active" data-toggle="dropdown" id="adminDropdown">
                    <img src="https://pharmavends.net/admin/assets/images/dashboard/profilr.png" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-item-text font-weight-bold text-dark">
                        <?php echo $admin_email; ?>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo base_url('admin/logout'); ?>" onclick="return confirm('Are you sure you want to logout?');" class="dropdown-item text-danger">
                        🔓 Logout
                    </a>
                </div>
            </div>
        </div>

    </header>