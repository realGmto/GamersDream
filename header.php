<link rel="stylesheet" href="styles/header.css">
<header class="header py-3">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <div class="d-flex align-items-center">
                <a href="index.php">
                    <img src="imgs/logo.jpg" alt="Logo" class="logo me-3">
                </a>
                <nav class="d-none d-lg-flex">
                    <?php
                        session_start();
                        $current_page = $_SERVER['REQUEST_URI'];
                        if (strpos($current_page, 'index.php') !== false)
                            echo '
                                <div class="dropdown">
                                    <button class="btn btn-outline-info dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        GENRES
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenu2">
                                        <li><button class="dropdown-item" type="button" onclick="GenreSelected(event)">FPS</button></li>
                                        <li><button class="dropdown-item" type="button" onclick="GenreSelected(event)">Action</button></li>
                                        <li><button class="dropdown-item" type="button" onclick="GenreSelected(event)">Adventure</button></li>
                                        <li><button class="dropdown-item" type="button" onclick="GenreSelected(event)">Strategy</button></li>
                                        <li><button class="dropdown-item" type="button" onclick="GenreSelected(event)">Survival</button></li>
                                        <li><button class="dropdown-item" type="button" onclick="GenreSelected(event)">RPG</button></li>
                                        <li><button class="dropdown-item" type="button" onclick="GenreSelected(event)">Horror</button></li>
                                        <li><button class="dropdown-item" type="button" onclick="GenreSelected(event)">Racing</button></li>
                                        <li><button class="dropdown-item" type="button" onclick="GenreSelected(event)">MMO</button></li>
                                        <li><button class="dropdown-item" type="button" onclick="GenreSelected(event)">Co-op</button></li>
                                        <li><button class="dropdown-item" type="button" onclick="GenreSelected(event)">Fighting</button></li>
                                    </ul>
                                </div>
                            ';
                    ?>
                </nav>
            </div>

            <!-- Search Bar -->
            <?php
                $current_page = $_SERVER['REQUEST_URI'];
                if (strpos($current_page, 'index.php') !== false)
                    echo'
                                    <div class="search-bar mx-auto">
                                        <form class="d-flex" onsubmit="search(event)">
                                            <input class="form-control search-input text-white" id="myInput" type="search" placeholder="Search..." aria-label="Search">
                                        </form>
                                    </div>
                ';
            ?>
            <!-- Cart and Sign In -->
            <div class="d-flex align-items-center">
                <a href="cart.php" class="text-white mx-3 p-1 cart-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                    </svg>
                </a>
                <?php

                    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
                        echo '<button type="button" class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#signInModal">Sign in</button>';
                    } else {
                        $username = $_SESSION['username'];
                        echo '
                        <button class="btn btn-outline-info" type="button" id="dropdownMenu3" data-bs-toggle="dropdown" aria-expanded="false">
                            '. htmlspecialchars($username) .'
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenu3">
                            <li><button class="dropdown-item" type="button" onclick="Logout()">Logout</button></li>
                        </ul>
                        ';
                    }
                ?>
            </div>
            <!-- Menu icon -->
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] === "admin"){
                    echo 
                    '            
                        <button class="btn btn-dark ms-3" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                            </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenu">
                            <li><button class="dropdown-item" type="button" onclick="window.location.href=`insertProduct.php`">Add New Game</button></li>
                        </ul>
                    ';
                }
            ?>
        </div>
    </header>
     <!-- Sign In Modal -->
     <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signInModalLabel">Sign In</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="signInForm" onsubmit="Login(event)">
                        <div class="mb-3">
                            <label for="signInEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control text-white" id="signInEmail" required>
                            <div class="invalid-feedback" id="signInEmailError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="signInPassword" class="form-label">Password</label>
                            <input type="password" class="form-control text-white" id="signInPassword" required>
                            <div class="invalid-feedback" id="signInPasswordError"></div>
                        </div>
                        <div class="invalid-feedback" id="loginMessage"></div>
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </form>
                    <div class="text-center mt-3">
                        <p>Don't have an account? <a href="#" id="goToRegister" data-bs-dismiss="modal">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registerForm" onsubmit="Register(event)">
                        <div class="mb-3">
                            <label for="registerUsername" class="form-label">Username</label>
                            <input type="text" class="form-control text-white" id="registerUsername" required>
                            <div class="invalid-feedback" id="registerUsernameError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control text-white" id="registerEmail" required>
                            <div class="invalid-feedback" id="registerEmailError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control text-white" id="registerPassword" required>
                            <div class="invalid-feedback" id="registerPasswordError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control text-white" id="confirmPassword" required>
                            <div class="invalid-feedback" id="confirmPasswordError"></div>
                        </div>
                        <div class="invalid-feedback" id="registerMessage"></div>
                        <button type="submit" class="btn btn-secondary w-100">Register</button>
                    </form>
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="#" id="goToSignIn" data-bs-dismiss="modal">Sign in here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="scripts/header.js"></script>