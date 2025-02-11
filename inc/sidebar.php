<?php include './dbConnection/dbConnection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./icons/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">

    <script defer src="./js/bootstrap.bundle.min.js"></script>
    <script defer src="./js/sidebar.js"></script>
    <script defer src="./js/themes.js"></script>
</head>
<body>
    
    <div class="wrapper">
        <aside class="sidebar expand">
            <div class="d-flex mt-4">
                <button id="toggle-btn" type="button"><i class="fa-duotone fa-solid fa-bars"></i></button>
                <div class="sidebar-logo">
                    <a href="#">DATAMEX COLLEGE</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="./index.php" class="sidebar-link">
                        <i class="fas fa-chart-pie"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="./register.php" class="sidebar-link">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Register</span>
                    </a>
                </li>
                <li class="sidebar-item has-dropdown">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="fas fa-user-graduate"></i>
                        <span>Students</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <span>SHS Student</span> 
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <span>College Student</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fas fa-users-cog"></i>
                        <span>Accounts</span>
                    </a>
                </li>   
            </ul>
            <div class="sidebar-footer">
                    <a href="#" class="sidebar-link" id="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
            </div>
        </aside>

        <div class="main">
            

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
            id="bd-theme"
            type="button"
            aria-expanded="false"
            data-bs-toggle="dropdown"
            aria-label="Toggle theme"
            style="color: var(--foreground);">
            <i class="fa-solid fa-circle-half-stroke bi my-1 theme-icon-active"></i>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
                    <i class="fa-solid fa-sun bi me-2 opacity-50"></i>
                    Light
                    <i class="fa-solid fa-check bi ms-auto d-none"></i>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
                    <i class="fa-solid fa-moon bi me-2 opacity-50"></i>
                    Dark
                    <i class="fa-solid fa-check bi ms-auto d-none"></i>
                </button>
            </li>
        </ul>
    </div>

