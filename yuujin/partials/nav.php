<?php
session_start();
echo '<nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" id="nav">Yuujin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-center" id="offcanvasDarkNavbarLabel">Welcome to Yuujin!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Boards
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="/yuujin/ecm.php?catid=1">/ecm</a></li>
                                <li><a class="dropdown-item" href="/yuujin/ecm.php?catid=2">/ece</a></li>
                            </ul>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '
                            <p class="text-light">Welcome ' . $_SESSION['useremail'] . '</p>
                            <a href="partials\logout.php" class="btn btn-danger" type="submit">Log Out</a>
                        </form>';
} else {
    echo '  <li class="nav-item">
                                <a class="nav-link" href="partials\sign_up.php" data-bs-toggle="modal" data-bs-target="#signupModal"
                                >Sign Up</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="partials\login.php"
                                data-bs-toggle="modal" data-bs-target="#loginModal">Log In</a>
                            </li>
                            </li>
                        </ul>
                    </div>';
}

echo ' </div>
        </div>
    </nav>';
