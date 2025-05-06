<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <style>
        .navbar {
            background: linear-gradient(135deg, #1A4870 0%, #2C3E50 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem;
        }
        .navbar-brand {
            font-weight: 600;
            font-size: 1.4rem;
            color: #fff !important;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .navbar-brand i {
            color: #4CAF50;
            margin-right: 8px;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 15px;
            background: rgba(255,255,255,0.1);
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .user-info:hover {
            background: rgba(255,255,255,0.2);
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, #4CAF50, #45a049);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.2rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .user-name {
            color: #fff;
            font-weight: 500;
            font-size: 1rem;
        }
        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }
        .navbar-toggler:focus {
            box-shadow: none;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Sidebar Fixed to the Left */


    </style>
</head>
<body>
    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('TeacherDashboard/index') ?>">
                <i class="bi bi-mortarboard-fill"></i>Teacher Portal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <div class="user-info">
                            <!-- <div class="user-avatar">
                                <?= substr($teacher->name, 0, 1) ?>
                            </div>
                            <span class="user-name"><?= $teacher->name ?></span> -->

                            <?php if (isset($teacher) && $teacher): ?>
                                <div class="user-avatar">
                                    <?= substr($teacher->name, 0, 1) ?>
                                </div>
                                <span class="user-name"><?= $teacher->name ?></span>
                            <?php else: ?>
                                <div class="user-avatar">?</div>
                                <span class="user-name">Unknown</span>
                            <?php endif; ?>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html> 