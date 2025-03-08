<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="icons/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script defer src="js/bootstrap.bundle.min.js"></script>
    <script defer src="js/themes.js"></script>
</head>

<body>
    <div class="main d-flex justify-content-center align-content-center">

        <div class="container d-flex w-100 justify-content-center align-content-center p-0">
            <div class="login-form m-auto d-flex flex-column ">
                <div class=" w-100 d-flex flex-column text-center mb-3 mt-5">
                    <img src="img/logo.png" alt="logo" class="login-logo m-auto">
                    <h1 class="fs-4 text-uppercase m-0">Datamex College Saint Adeline</h1>
                </div>
                <div class="w-100  text-center mb-5">
                    <h1 class="fs-2 text-uppercase">LOGIN</h1>
                </div>
                <form id="loginForm" class="row g-3 needs-validation w-100" method="post" novalidate>
                    <div class="col-10 m-auto">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                        <div class="invalid-feedback">
                            Username must not be empty.
                        </div>
                    </div>
                    <div class="col-10 mb-5 m-auto">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                        <div class="invalid-feedback">
                            Password must not be empty.
                        </div>
                    </div>
                    <div class="col-10 w-75 d-flex m-auto">
                        <button class="btn btn-primary m-auto w-100 p-2" type="submit" id="submit" name="login">Login</button>
                    </div>
                </form>
            </div>

        </div>

        <div id="success-alert" class="alert alert-success p-3 d-flex justify-content-center align-content-center" role="alert"></div>
        <div id="error-alert" class="alert alert-danger p-3 d-flex justify-content-center align-content-center " role="alert"></div>
        <div id="warning-alert" class="alert alert-warning p-3 d-flex justify-content-center align-content-center " role="alert"></div>


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
    </div>

    <div class="loading-screen" id="loadingScreen">
        <div class="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
        <p style="color: var(--clr-light); margin-top: 10px;">Logging in...</p>
    </div>

    <script src="js/validateLogin.js"></script>
</body>

</html>
