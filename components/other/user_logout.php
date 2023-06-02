<?php 
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
        
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "logout") {
            // Destroy all session data
            session_unset();
            session_destroy();

            header("Location: index.php");
            exit;
        }
    ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2"></i><?php echo $_SESSION['loggedUser']["UserName"] ?>
                    </a>
                        
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-power-off me-2"></i>
                            <form action="" method="post">
                                <input type="hidden" name="action" value="logout">
                                <button type="submit">Abemelden</button>
                            </form>
                        </a>
                    </li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php
    }
?>